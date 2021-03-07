<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AuthAdmin
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
        if (session('utype') === 'ADM') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
