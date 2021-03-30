<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreRoomRequest;
use App\Http\Requests\admin\UpdateRoomRequest;
use App\Models\AvailabilityType;
use App\Models\Image;
use App\Models\Price;
use App\Models\RatingRoom;
use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends BackendController
{

    public function index()
    {
        $this->data["rooms"] = Room::getRooms()->with('reviews')->with('ratingRooms')->orderByDesc('id')->paginate(5);
        return view("admin.pages.rooms.index",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->data["prices"] = Price::all();
        $this->data["types"] = Type::all();
        $this->data["services"] = Service::all();

        return view("admin.pages.rooms.add", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
//       @dd($request->all());

        DB::beginTransaction();
        try{
            $at = new AvailabilityType();
            $at->quantity = $request->quantity;
            $at->type_id = $request->type;
            $at->save();

            $atId = $at->id;

            $room = new Room();
            $room->name = $request->get('name');
            $room->price_id = $request->get('price');
            $room->size = $request->get('size');
            $room->description = $request->get('description');
            $room->availability_type_id = $atId;

            $image = new Image();
            $image->path = Room::uploadCoverImage($request->image);
            $image->save();

            $imgId = $image->id;

            $room->image_id = $imgId;
            $room->save();

            $room->services()->attach($request->service);

            DB::commit();

            return redirect()->route('rooms-manage.index', $room->id)->with('successInsertRoom', 'Room edited successfully!');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('rooms-manage.create', $room->id)->with('errorInsertRoom', $e->getMessage());
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
        $this->data["room"] = Room::getRooms()->with('reviews')->with('ratingRooms')->find($id);
        return view("admin.pages.rooms.room-details",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["prices"] = Price::all();
        $this->data["types"] = Type::all();
        $this->data["services"] = Service::all();

        $this->data["room"] = Room::getRooms()->find($id);

        $this->data["selectedPrice"] = Room::first()->price_id;
//        $this->data["selectedType"] = Room::with('availabilityType');

        return view('admin.pages.rooms.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $id)
    {
//
//               @dd($request->all());

        DB::beginTransaction();

        try
        {

            $room = Room::find($id);
            $room->name = $request->get('name');
            $room->price_id = $request->get('price');
            $room->size = $request->get('size');
            $room->description = $request->get('description');

            if($request->has('image')){
                $image = new Image();
                $image->path = Room::uploadCoverImage($request->image);
                Room::deleteCoverImage($room->image_id);
                $newImage = new Image();
                $newImage->path = Room::uploadCoverImage($request->image);
                $newImage->save();
                $room->image_id = $newImage->id;
                $room->save();
            }

            $room->save();

            $room->services()->sync($request->service);

            $at = AvailabilityType::find($room->availability_type_id);
            $at->quantity = $request->quantity;
            $at->type_id = $request->type;
            $at->save();


            DB::commit();

            return redirect()->route('rooms-manage.index', $room->id)->with('successUpdateRoom', 'Room edited successfully!');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('rooms-manage.edit', $room->id)->with('errorUpdateRoom', $e->getMessage());
        }

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
            $room = Room::find($id);

            $room->services()->detach();
            $room->reviews()->detach();
            $room->ratingRooms()->delete();
            $room->reservations()->delete();
            $room->delete();


            return redirect()->back()->with('successDeleteRoom', 'Room deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeleteRoom', $ex->getMessage());
        }
    }
}
