<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckUser
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
        $uri = $request->route()->uri;
        $type = preg_split("#/#", $uri)[0]; 

        if (!\Auth::check())
            return redirect('/');

        if (\Auth::user()->type == User::TYPE_USER && $type != 'user')
            return redirect('/');

        if (\Auth::user()->type == User::TYPE_ADMIN && $type != 'admin')
            return redirect('/');

        return $next($request);
    }
}
