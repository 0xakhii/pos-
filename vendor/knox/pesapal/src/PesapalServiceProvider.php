<?php

namespace Knox\Pesapal;

use Illuminate\Support\ServiceProvider;

class PesapalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $configPath = __DIR__ . '/config/pesapal.php';
        //$this->publishes([$configPath => config_path('pesapal.php')], 'config');
        $this->publishes([$configPath => config_path('pesapal.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Knox\Pesapal\PesapalAPIController');
        $this->app->bind('pesapal', function()
        {
            return new \Knox\Pesapal\Pesapal;
        });
    }
}
