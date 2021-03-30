<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\user\StoreReservationRequest;
use App\Models\AvailabilityType;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends FrontendController
{
//    public function index()
//    {
//        $orders = Reservation::where('user_id', session()->user()->id)
//            ->with(['room' => function ($query) {
//                return $query->with('type');
//            }])->orderBy('check_in', 'DESC')
//            ->paginate(6);
//
//        return view('orders.list', compact('orders'));
//    }

//    public function create($no)
//    {
//        $room = Room::where('no', $no)
//            ->with(['orders' => function ($query) {
//                return $query->where('check_out_at', '>=', Carbon::today());
//            }])
//            ->firstOrFail();
//
//        return view('orders.create', compact('room'));
//    }


    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {

            $currentQuantity = $request->quantity;

            if ($currentQuantity == 0){
                return response(['message' => 'Sorry, but all rooms of this type are already reserved'], Response::HTTP_CONFLICT);
            }

            $reservation = new Reservation();
            $reservation->name = $request->input('name');
            $reservation->phone = $request->input('phone');
            $reservation->sum_price = $request->input('price');
            $reservation->no_people = $request->input('numberPeople');

            $reservation->user_id = session('user')->id;
            $reservation->room_id = $request->room;

            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;


            $query = Reservation::where('user_id','=', session('user')->id)->where('room_id','=',$request->room)->where('name','=',$request->name);
            if($query->exists()){
                $check_in = explode(' ', $request->check_in)[0];
                $check_out = explode(' ', $request->check_out)[0];

                $reservations = $query->get();

                $ts_check_in = strtotime($check_in);
                $ts_check_out = strtotime($check_out);

                foreach($reservations as $r){
                    $check_inDB = explode(' ', $r->check_in)[0];
                    $check_outDB= explode(' ', $r->check_out)[0];

                    $ts_check_inDB = strtotime($check_inDB);
                    $ts_check_outDB = strtotime($check_outDB);

                    if (!($ts_check_in < $ts_check_inDB && $ts_check_out < $ts_check_inDB) && !($ts_check_in > $ts_check_outDB && $ts_check_out > $ts_check_outDB)){
                        return response(['message' => 'You have already made reservation for this range of dates for this room'], Response::HTTP_CONFLICT);
                    }
                }
            }

            $result = $reservation->save();

            $user = User::find($reservation->user_id);
            session()->put('user',$user);
            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "make reservation";

                $userActivity->save();
            }

            $details = Reservation::with('user','room')->whereHas('room',function($query) use ($request){
                return $query->where('room_id','=',$request->room);
            })->where('name','=',$request->name)->first();


            $currentQuantity = $request->quantity;
            $idAt = $request->availability_type_id;
            $at = AvailabilityType::where('quantity','=',$currentQuantity)->find($idAt);
            $newQuantity = $at->quantity-1;
            $at->update(['quantity'=> $newQuantity]);



            \DB::commit();
/////////////////////////////////////////////////////////////////
            if($result)
                return response(['message' => 'Reservation is made successfully', 'details'=>$details, 'quantity'=>$at->quantity], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Data is invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch(\Exception $ex) {
            \DB::rollBack();
            \Log::error($ex->getMessage());
            return response(['message'=> $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}
