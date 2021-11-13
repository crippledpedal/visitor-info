<?php

namespace Mezbilisim\VisitorInfo;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Mezbilisim\VisitorInfo\Http\Middleware\SetVisitorInfo;

class VisitorInfoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'visitor-info');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', SetVisitorInfo::class);

        $this->publishes([
            __DIR__ . '/database/migrations/2021_11_12_124909_create_visitors_table.php' => database_path('migrations/2021_11_12_124909_create_visitors_table.php'),
            __DIR__ . '/resources/assets' => public_path('visitor-info'),
            __DIR__ . '/config/visitor.php' => config_path('visitor.php'),
        ]);
    }
    public function register()
    {

    }
}
