<?php

namespace App\Http\Controllers;

use App\Models\HotelService;
use App\Models\Room;
use App\Models\Testimonial;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function index()
    {
        //return "Home Controller";
        $this->data["rooms"] = Room::getRooms()->limit(3)->orderBy('price')->get();
        $this->data["hotelServices"] = HotelService::getHotelServices();
        $this->data["testimonial"] = Testimonial::with('user')->get();
        if(session('user')){
            $userActivity = new UserActivity();
            $userActivity->user_id = session()->get("user")->id;
            $userActivity->ip_address = request()->ip();
            $userActivity->date = date("Y-m-d H:i:s");
            $userActivity->activity = session()->get("user")->username. " visited Home." . "\t";

            $userActivity->save();
        }
        return view("frontend.pages.main.home",$this->data);


    }

    public function about()
    {
        //return "About Controller";
        $this->data["hotelServices"] = HotelService::all()->take(6);
        return view("frontend.pages.main.about",$this->data);
    }
}
