<?php

namespace App\Http\Middleware;

use Closure;
use App\custombackend;

class CustomeBackendMiddleware
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
        $get = new custombackend;
        $data = $get::orderBy("created_at","DESC")->get();
        foreach ($data as $row) {
            $request["footer"] = $row->footer_kiri;
        }
        

        return $next($request);
    }
}
