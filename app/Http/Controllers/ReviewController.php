<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\RatingRoom;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.rooms.create-review-form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {

        try {
            $review = new Review();
            $review->message = $request->input('message');
            $review->user_id = session('user')->id;

            $review->save();

            $insertedReview = $review->id;
            $userReview = new UserReview();
            $userReview->review_id = $insertedReview;
            $userReview->room_id = $request->room;

            $saved  = $userReview->save();
            $result = $saved;

            $user = User::find($review->user_id);
            session()->put('user',$user);
            $allReviews = Review::with('user','rooms')->whereHas('rooms',function($query) use ($request){
                return $query->where('room_id','=',$request->room);
            })->get();

            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "create review";

                $userActivity->save();
            }

/////////////////////////////////////////////////////////////////
            if($result)
                return response(['message' => 'Review is created successfully','reviews'=>$allReviews], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch(\Exception $ex) {

            \Log::error($ex->getMessage());
            return response(['message'=> $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function rating(Request $request){
        try{
            $user = User::find(session()->get('user')->id);


         $query = RatingRoom::where('user_id','=', session('user')->id)->where('room_id','=',$request->room);
         if($query->exists()){

             $query->update(["value"=>$request->grade]);
             session()->put('user',$user);
             return response(['message' => 'Successfully updated vote'], Response::HTTP_CREATED);

         }
            $rate = new RatingRoom();
            $rate->value = $request->grade;
            $rate->room_id = $request->room;
            $rate->user_id = session('user')->id;


        $saved = $rate->save();
        $result = $saved;

//        $user = User::find($rate->user_id);
        session()->put('user',$user);
            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "rated room";

                $userActivity->save();
            }

            if($result)
                return response(['message' => 'Successfully voted'], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Server Error'], Response::HTTP_UNPROCESSABLE_ENTITY);

        }catch (Exception $e){
            return response(['message'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $review = Review::find($id);
            $user = User::find($review->user_id);

//            @dd($review->rooms);
            $room = $review->rooms()->first()->name;
            $review->rooms()->detach();
            $review->delete();

            session()->put('user',$user);

            return redirect()->back()->with('successDeleteReview', 'Review from for room' . ' '. $room . 'deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeleteReview', $ex->getMessage());
        }
    }
}
