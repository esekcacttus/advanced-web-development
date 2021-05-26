<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKey
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
        if($request->header('authorization')){
            $credentials = $request->header('authorization');
            $credentials = str_replace("Basic ", "", $credentials);
            var_dump(base64_decode($credentials));die();
            if($credentials == env('BASIC_AUTH', null)){
                return $next($request);
            }
        }
        if(!$request->hasHeader('x-api-key') || $request->header('x-api-key') != env('API_KEY', '1234')){
            return response(null, 403);
        }

        return $next($request);
    }
}
