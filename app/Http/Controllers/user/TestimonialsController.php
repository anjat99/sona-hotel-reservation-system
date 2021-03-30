<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class TestimonialsController extends FrontendController
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
        //
    }


    public function store(Request $request)
    {
        try {

            $testimonial = new Testimonial();

            $testimonial->description = $request->description;
            $testimonial->user_id = session('user')->id;

            $testimonial->save();

            $user = User::find($testimonial->user_id);
            session()->put('user',$user);

            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "create testimonial";

                $userActivity->save();
            }


            return  redirect()->back()->with("successAdd", "Successfully added testimonial.");
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect()->back()->with("warningAdd", $ex->getMessage());
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


    public function update(Request $request, $id)
    {

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
            $testimonial = Testimonial::find($id);
            $user = User::find($testimonial->user_id);

            $testimonial->delete();
            session()->put('user',$user);

            return redirect()->back()->with('successDeleteTest', 'Testimonial deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('successDeleteTest', $ex->getMessage());
        }
    }
}
