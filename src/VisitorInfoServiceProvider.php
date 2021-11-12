<?php

namespace Mezbilisim\VisitorInfo;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Mezbilisim\VisitorInfo\Http\Middleware\GetVisitorInfo;

class VisitorInfoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'visitor-info');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', GetVisitorInfo::class);
    }
    public function register()
    {

    }
}
