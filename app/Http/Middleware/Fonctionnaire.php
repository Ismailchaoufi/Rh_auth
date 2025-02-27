<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Fonctionnaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
        if(Auth::user()->role=='0'){
            return $next($request);//if admin then redirect me to the dashbord admin =$request
        }
        else
        {
            return redirect('/login')->with('status','Access denied ! as you are not Fonctionnaire');//else redirect me to the /home with warning message
        }
    }
        else
        {
            return redirect('/login')->with('status','Please Login first');
        }
    }
}
