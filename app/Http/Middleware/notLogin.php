<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class notLogin
{
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check())
        {
            return redirect('/admin');
        }
        return $next($request);
    }
}
