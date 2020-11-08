<?php

namespace Sentrasoft\Indonesia;

use Illuminate\Support\ServiceProvider;
use Sentrasoft\Indonesia\Commands\Seed;

class IndonesiaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config = __DIR__.'/../config/indonesia.php';
        $migration = __DIR__.'/../database/migrations/create_indonesia_table.stub';

        $this->publishes([
            $config => base_path('config/indonesia.php'),
        ], 'config');

        $this->publishes([
            $migration => database_path(sprintf('migrations/%s_create_indonesia_table.php', date('Y_m_d_His'))),
        ], 'migrations');

        $this->mergeConfigFrom($config, 'indonesia');
    }

    public function register()
    {
        $this->app->bind('indonesia', function () {
            return new IndonesiaManager();
        });

        $this->commands([
            Seed::class
        ]);
    }
}
