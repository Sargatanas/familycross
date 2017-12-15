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
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Redirect
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->is_admin) {
            return redirect(route('main'))
                ->with('status', 'Данная страница доступна только администраторам');
        }

        return $next($request);
    }
}

