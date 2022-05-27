<?php

namespace Tinigin\Calculator;

use Illuminate\Support\ServiceProvider;
use Tinigin\Calculator\Console\InstallCalculator;
use Illuminate\Support\Facades\Route;
use Tinigin\Calculator\Calculator;

class CalculatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'calculator');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'calculator');
//        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('calculator.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/calculator'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-cms'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-cms'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);

            $this->commands([
                InstallCalculator::class
            ]);

            if (! class_exists('CreateCalculatorTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_calculator_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cms_user_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        // $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravelcms');

        // Register the main class to use with the facade
        $this->app->bind('calculator', function ($app) {
            return new Calculator();
        });

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('calculator.php'),
        ], 'config');
    }
}
