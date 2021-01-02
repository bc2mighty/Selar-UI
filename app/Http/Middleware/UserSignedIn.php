<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserSignedIn
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
        $user_id = session('user_id');
        $signed_in = session('signed_in');
        if($user_id && $signed_in) {
            $request->session()->flash('success', 'You\'re signed in.');
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
