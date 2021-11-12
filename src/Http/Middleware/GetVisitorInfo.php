<?php

namespace Mezbilisim\VisitorInfo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;


class GetVisitorInfo
{
    public function handle(Request $request, Closure $next)
    {
        $requestPath = $request->getPathInfo();

        $visitorData = [
            'ip'      => $request->ipinfo->ip ?? null,
            'country' => $request->ipinfo->county_name ?? null,
            'city'    => 'deneme',
            'url'     => $requestPath,
        ];

        Visitor::create($visitorData);


        return $next($request);
    }
}
