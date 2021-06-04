<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Auth;

class checkIfBlocked
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
        if(Auth::user()->blocked_until > now()){
            $days = now()->diffInDays(Auth::user()->blocked_until);
            auth()->logout();
            return redirect()->route('login')->with(['status' => 'Je bent geblokkeerd voor '.$days.' dagen']);
        }
        return $next($request);

    }
}
