<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\user\ChangePasswordRequest;
use App\Http\Requests\user\UpdateProfileUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserController extends FrontendController
{
    public function index()
    {

        if(session('user')){
            $userActivity = new UserActivity();
            $userActivity->user_id = session()->get("user")->id;
            $userActivity->ip_address = request()->ip();
            $userActivity->date = date("Y-m-d H:i:s");
            $userActivity->activity = session()->get("user")->username. " visited Profile page." . "\t";

            $userActivity->save();
        }
        return view('frontend.pages.users.index', $this->data);
    }

    public function edit($id)
    {
        $this->data["u"] = User::find($id);
        return view('frontend.pages.users.profile.edit-profile', $this->data);
    }

    public function update(UpdateProfileUserRequest $request, $id)
    {
        try{
            $user = User::find($id);
            $request->session()->put('user', $user);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;

            if($user->email !== $request->email)
            {
                $exists = User::where('email',$request->email)->exists();
                if($exists)
                    return redirect()->back()->with('warningUpdateUser','There is already an user with that email!');
                $user->email = $request->email;
            }

            $user->save();

            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "update profile";

                $userActivity->save();
            }


            return redirect()->route('profile', $user->id)->with('successUpdateUser', "User profile updated successfully!");
        }catch(\Exception $e){
            return redirect()->route('profile', $user->id)->with('warningUpdateUser', $e->getMessage());
        }
    }

    public function formChangePassword($id){
        $this->data["u"] = User::find($id);
        return view('frontend.pages.users.profile.change-password', $this->data);
    }

    public function changePassword(ChangePasswordRequest $request, $id){
        try {
            $user = User::find($id);

            if($user->password !== md5($request->current_password))
            {
                return redirect()->back()->with('warningChangePassword','Please provide a valid current password.');
            }
            if($request->password !== $request->password_confirmation)
            {
                return redirect()->back()->with('warningChangePassword','The new password needs to match filed for confirmation.');
            }
            $user->password = md5($request->password);
            $user->save();

            session()->put('user',$user);

            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "update password";

                $userActivity->save();
            }
            return redirect()->back()->with('successChangePassword','You have successfully changed your password!');
        }catch (\Exception $e)
        {
            return redirect()->back()->with('errorChangePassword','There was an error occured during changing  your password!');
        }
    }
}
