<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

/**
 * Проверяем, существует ли пользователь
 *
 * Class IsNoteExist
 * @package App\Http\Middleware
 */
class IsUserExist
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
        $user_id = $request->user_id ?? $request->id;

        if (blank(User::find($user_id))) {
            return abort(404);
        }

        return $next($request);
    }
}
