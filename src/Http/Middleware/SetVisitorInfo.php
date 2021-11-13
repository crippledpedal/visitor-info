<?php

namespace Mezbilisim\VisitorInfo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mezbilisim\VisitorInfo\Models\Visitor;


class SetVisitorInfo
{
    public function handle(Request $request, Closure $next)
    {
        if (!str_contains($request->url(), 'broadcasting') && !str_contains($request->url(), 'livewire')) {
            $visitorData = [
                'ip'      => $request->ip() ?? null,
                'country' => $request->ipinfo->county_name ?? null,
                'city'    => $request->ipinfo->city ?? null,
                'url'     => $request->fullUrl() ?? null,
                'referer' => $_SERVER['HTTP_REFERER'] ?? null,
            ];

            Visitor::create($visitorData);
        }


        return $next($request);
    }
}
