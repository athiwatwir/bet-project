<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddAuthHeader
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
        if ($request->session()->has('_t')) {
            $token = $request->session('_t');
            $request->headers->add([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]);
            
            return $next($request);
        }

        return view('/login');
        
    }
}
