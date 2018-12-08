<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Customer
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
        if (\Auth::user()->type != User::TYPE_USER)
            return redirect('/');

        return $next($request);
    }
}
