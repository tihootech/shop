<?php

namespace App\Http\Middleware;

use Closure;

class CheckMaster
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
        $current_user = auth()->user();
        if ($current_user && $current_user->type == 'master') {
            return $next($request);
        }else {
            abort(403);
        }
    }
}
