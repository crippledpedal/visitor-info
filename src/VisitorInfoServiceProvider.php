<?php

namespace Mezbilisim\VisitorInfo;

use Illuminate\Support\ServiceProvider;

class VisitorInfoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'visitor-info');
    }
    public function register()
    {

    }
}
