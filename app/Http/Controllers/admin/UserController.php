<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BackendController
{


    public function index()
    {
        $this->data["rolesAdminP"] = Role::all();
        $this->data["users"] = User::userWithReviewsTest();
        return view("admin.pages.users.index",$this->data);
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
        $this->data["roles"] = Role::all();
        $this->data["user"] = User::with('role')->find($id);
        $this->data["selectedRole"] = User::first()->role_id;

        return view('admin.pages.users.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
//        @dd($request->all());
        try{
            $user = User::with('role')->find($id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            if($user->email !== $request->email)
            {
                $exists = User::where('email',$request->email)->exists();
                if($exists)
                    return redirect()->back()->with('warningUpdateUser','There is already an user with that email!');
                $user->email = $request->email;
            }

//            $user->email = $request->email;
            $user->role_id = $request->userRole;
            $user->save();

            return redirect()->route('users.index', $user->id)->with('successUpdateUser', "User updated successfully!");
        }catch(\Exception $e){
            return redirect()->route('users.edit', $user->id)->with('warningUpdateUser', $e->getMessage());
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
            $user = User::find($id);
            $userEmail = $user->email;
//            @dd($review->rooms);

            $user->testimonials()->delete();
            $user->ratingRooms()->delete();
            $user->reservations()->delete();
            $user->reviews()->delete();
            $user->delete();



            return redirect()->back()->with('successDeleteUser', 'User with email ' . ' '. $userEmail .' deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeleteUser', $ex->getMessage());
        }
    }
}
