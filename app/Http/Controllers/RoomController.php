<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class RoomController extends FrontendController
{

    const ROOM_LIMIT = 6;

    private $roomsModel;

    public function __construct()
    {
        parent::__construct();
        $this->roomsModel = new Room();
    }

    public function index(Request $request)
    {
        $this->data['services'] = Service::all();
        $this->data['types'] = Type::all();
        $this->data["rooms"] = Room::getSortFilterSearchAndPage($request)->orderBy('id')->paginate(self::ROOM_LIMIT);

        if(session('user')){
            $userActivity = new UserActivity();
            $userActivity->user_id = session()->get("user")->id;
            $userActivity->ip_address = request()->ip();
            $userActivity->date = date("Y-m-d H:i:s");
            $userActivity->activity = session()->get("user")->username. " visited Rooms." . "\t";

            $userActivity->save();
        }

        return view('frontend.pages.rooms.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

        $data = Room::getRoom($id);
        $this->data["room"] = $data['room'];
        $this->data['reviews'] = $data['reviews'];
        $this->data['ratings'] = $data['ratings'];



        return view('frontend.pages.rooms.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
