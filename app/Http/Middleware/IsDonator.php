<?php

namespace App\Http\Middleware;

use Closure;


class IsDonator
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
        if($request->is_donator == 1){
            return $next($request);
        }else{
            return response()->json(['message' => 'You do not have the right to create a donation organization'],401);
        }
        
    }
}
