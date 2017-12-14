<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

/**
 * Проверяем, авторизован ли пользователь
 *
 * Class CheckAuth
 * @package App\Http\Middleware
 */
class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        if (blank(Auth::user())) {
            return view('login');
        }

        return $next($request);
    }
}

