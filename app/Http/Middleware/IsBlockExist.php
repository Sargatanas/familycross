<?php

namespace App\Http\Middleware;

use App\Block;
use Closure;

/**
 * Проверяем, существует ли блок
 *
 * Class IsBlockExist
 * @package App\Http\Middleware
 */
class IsBlockExist
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
        $block_id = $request->block_id ?? $request->id;

        if (blank(Block::find($block_id))) {
            return abort(404);
        }

        return $next($request);
    }
}
