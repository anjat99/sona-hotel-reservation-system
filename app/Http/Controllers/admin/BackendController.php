<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["adminMenu"] = AdminMenu::getAdminMenu();
    }

    public function index(){
        $this->data["activities"] = UserActivity::with('user')->orderByDesc('date')->paginate(5);
        $this->data["users"] = User::latestFiveRegisteredUsers();
        return view('admin.pages.dashboard', $this->data);
    }




    public function logout(Request $request) {
        if(session()->has('user')){
            $userActivity = new UserActivity();
            $userActivity->user_id = session()->get("user")->id;
            $userActivity->ip_address = request()->ip();
            $userActivity->date = date("Y-m-d H:i:s");
            $userActivity->activity = "logout";

            $userActivity->save();
        }
        $request->session()->remove("user");
        return redirect()->route("login.create")->with("success", "Admin successfully logged out.");
    }

}
