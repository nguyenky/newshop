<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            
            if($user->role == 1){
                return $next($request);
            }else{
                return redirect('/');
            }
        }
        else
            return redirect('/login');
        return $next($request);
    }
}
