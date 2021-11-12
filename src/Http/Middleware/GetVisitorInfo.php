<?php

namespace Mezbilisim\VisitorInfo\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GetVisitorInfo
{
    public function handle(Request $request, Closure $next)
    {
        $visitorData = [
            'ip'      => $request->ipinfo->ip ?? null,
            'country' => $request->ipinfo->county_name ?? null,
            'city'    => '',
            'url'     => '',
        ];

        $requestPath = $request->getPathInfo();
        $explodePath = explode('/', $requestPath);
        array_shift($explodePath);


        return $next($request);
    }
}
