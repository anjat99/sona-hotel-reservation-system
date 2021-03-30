<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\SendMail;
use App\Models\Activity;
use App\Models\Menu;
use App\Models\Newsletter;
use App\Models\SocialMedia;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FrontendController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::getMenu();
        $this->data["socialMedias"] = SocialMedia::getSocialMedia();
    }

    public function showRegisterForm()
    {
        return view("frontend.pages.main.register", $this->data);
    }

    public function register(RegistrationRequest $request){

        try {
            $user = new User();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = md5($request->password);
            $user->role_id = 2;
            $user->created_at = date("Y-m-d h:i:s");
            $user->updated_at = date("Y-m-d h:i:s");

            $user->save();
            if(session()->has('user')){
                $userActivity = new UserActivity();
                $userActivity->user_id = session()->get("user")->id;
                $userActivity->ip_address = request()->ip();
                $userActivity->date = date("Y-m-d H:i:s");
                $userActivity->activity = "registered";

                $userActivity->save();
            }


            return  redirect()->route("login.create")->with("success", "User successfully registered.");
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect()->back()->with("error", "An error has occurred, please try again later.");
        }
    }

    public function showLoginForm()
    {
        return view("frontend.pages.main.login", $this->data);
    }

    public function login(LoginRequest $request) {

        try {
            $user = User::with('role')->with('testimonials')->with('reviews')->with('reviews.rooms')->with('reservations')->with('reservations.room')->with('reservations.room.price')->with('reservations.user')->where([
                'email' => $request->email,
                'password' => md5($request->password)
            ])->first();

            if ($user) {
                $request->session()->put('user', $user);
                if(session()->has('user')){
                    $userActivity = new UserActivity();
                    $userActivity->user_id = session()->get("user")->id;
                    $userActivity->ip_address = request()->ip();
                    $userActivity->date = date("Y-m-d H:i:s");
                    $userActivity->activity = "login";

                    $userActivity->save();
                }

                return $user->role_id === 1 ? redirect(route("admin"))->with("success", "Admin successfully login.") : redirect(route("home"))->with("success", "User successfully logged in .");

            } else {
                return redirect()->back()->with("warning", "Wrong username or password.");
            }

        } catch (\Exception $e) {

            return redirect()->back()->with("error", $e->getMessage());
        }

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
        return redirect()->route("login.create")->with("success", "User successfully logged out.");
    }

    public function subscribe(Request $request){
        try {


            $query = Newsletter::where('email','=', $request->email);
            if($query->exists()){
                return response(['message' => 'Already subscribed to our newsletter!'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $subscriber = new Newsletter();
            $subscriber->email = $request->email;

            $saved =   $subscriber->save();
            $result = $saved;


            $details = [
                'title' => "News from SonaHotel.com",
                'body' => "Thank you for subscribing on our newsletter"
            ];

            \Mail::to($request->email)->send(new SendMail($details));

            if($result){

                return response(['message' => 'Successfully subscribed to our newsletter. We hope you enjoyed in news!'], Response::HTTP_CREATED);
            }else{
                return response(['message'=> 'Data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return response(['message'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

}
