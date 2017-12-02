<?php

namespace App\Http\Middleware;

use App\Note;
use Closure;

/**
 * Проверяем, существует ли записка
 *
 * Class IsNoteExist
 * @package App\Http\Middleware
 */
class IsNoteExist
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
        $note_id = $request->note_id ?? $request->id;

        if (blank(Note::find($note_id))) {
            return abort(404);
        }

        return $next($request);
    }
}
