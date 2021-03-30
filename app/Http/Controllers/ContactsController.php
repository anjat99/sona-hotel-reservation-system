<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactsController extends FrontendController
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
        return view("frontend.pages.main.contact",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $message = new Contact();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->subject = $request->input('subject');
            $message->message = $request->input('message');
            $message->is_read = 0;

            $result = $message->save();

            /** sending email to admin - radi  */
//            $details = [
//                'title' => $request->input('subject'),
//                'body' => $request->input('message')
//            ];
//
//            \Mail::to('anja.tomic099@gmail.com')->send(new SendMail($details));


            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "send message";

                $userActivity->save();
            }

            if($result)
                return response(['message' => 'Message is created successfully'], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
            return response(['message'=> $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
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
