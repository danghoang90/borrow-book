<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //code logic
        if (session()->get('role') !== 1) {
            abort(403, 'Khong co quyen thuc hien thao tac nay');
        }
        return $next($request);
    }
}
