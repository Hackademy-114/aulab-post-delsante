<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request: 
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return  \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->is_revisor){
            return $next($request);
        }
        
        return redirect(route('homepage'))->with('message', 'Non sei autorizzato');
    }
}