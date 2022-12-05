<?php

namespace Mezbilisim\VisitorInfo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mezbilisim\VisitorInfo\Models\Visitor;


class SetVisitorInfo
{
    public function handle(Request $request, Closure $next)
    {
        if (!str_contains($request->url(), 'broadcasting') && !str_contains($request->url(), 'livewire')) {
            ## IP ye göre kullanıcı konumu tespit ediliyor
            try {
                $geoip = geoip(request()->ip());

                #ziyaretçi bilgileri kaydediliyor
                $visitor_data = [
                    'ip'      => $request->ip() ?? null,
                    'country' => $geoip['country'] ?? null,
                    'city'    => $geoip['city'] ?? null,
                    'url'     => $request->fullUrl() ?? null,
                    'referer' => $_SERVER['HTTP_REFERER'] ?? null,
                ];
                Visitor::create($visitor_data);
            } catch (\Exception $exception) {
                Log::error($exception);
            }
        }


        return $next($request);
    }
}
