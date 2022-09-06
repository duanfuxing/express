<?php

namespace duan617\Express;

use Illuminate\Support\ServiceProvider;

class ExpressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('express.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'express');

        // Register the main class to use with the facade
        $this->app->singleton('express', function () {
            $config = config('express');

            return new Express($config);
        });
    }
}
