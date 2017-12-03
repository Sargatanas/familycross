<?php

namespace App\Http\Middleware;

use App\PublicNote;
use Closure;

class IsPublicNoteExist
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

        if (blank(PublicNote::where(['note_id' => $note_id])->first())) {
            return abort(404);
        }

        return $next($request);
    }
}
