<?php

namespace App\Http\Middleware;

use Closure;

class Api
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
        $token = $request->header('Token');
        if (!\App\User::checkToken($token) || !$token)
        {
            return redirect('/api/error');
        }
        elseif (\App\User::getAuthUserByToken($token)->type != \App\User::TYPE_USER) {
            \App\User::getAuthUserByToken($token)->clearApiToken();
            return redirect('/api/error');

        }

        return $next($request);
    }
}
