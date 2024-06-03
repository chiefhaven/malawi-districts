<?php

namespace HavenPlus\Districts;

use Illuminate\Support\ServiceProvider;
use HavenPlus\Districts\Console\Commands\InstallTranslationCommand;

class LaravelCountriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/districts.php' => config_path('districts.php'),
        ], 'districts-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            InstallTranslationCommand::class
        ]);
    }
}
