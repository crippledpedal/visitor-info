<?php

namespace Mezbilisim\VisitorInfo\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Visitor;

class GetVisitorInfo
{
    public function handle(Request $request, Closure $next)
    {
        $requestPath = $request->getPathInfo();
        $explodePath = explode('/', $requestPath);
        array_shift($explodePath);

        $visitorData = [
            'ip'      => $request->ipinfo->ip ?? null,
            'country' => $request->ipinfo->county_name ?? null,
            'city'    => 'deneme',
            'url'     => $explodePath,
        ];

        Visitor::create($visitorData);


        return $next($request);
    }
}
