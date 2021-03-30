<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has("user")){
            $user = $request->session()->get("user");
            return $user->role_id !== 2 ?  redirect()->route("home") : $next($request);
        }

        return  redirect()->route("home");
    }
}
