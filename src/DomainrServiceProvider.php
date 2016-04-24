<?php

namespace JungleTeam\Domainr;

use Illuminate\Support\ServiceProvider;

class DomainrServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/domainr.php' => config_path('domainr.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/domainr.php', 'domainr');
        $this->app->bind('Domainr', function () {
            return new Domainr;
        });
    }

    public function provides()
    {
        return ['Domainr'];
    }

}