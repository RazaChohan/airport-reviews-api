<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use App\Console\Commands\LoadCsvDataCommand;

class LoadCsvDataServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.load.csv', function()
        {
            return new LoadCsvDataCommand;
        });

        $this->commands(
            'command.load.csv'
        );
    }

}