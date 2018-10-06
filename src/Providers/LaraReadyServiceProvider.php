<?php

namespace Oravil\LaraReady\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Oravil\LaraReady\Middleware\checkInstall;
use Oravil\LaraReady\Console\LaraReady;

class LaraReadyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
    }

    /**
     * Bootstrap the application events.
     *
     * @param $void
     */
    public function boot(Router $router)
    {
		if ($this->app->runningInConsole()) {
        $this->commands([
            LaraReady::class,
        ]);
    }
        $router->middlewareGroup('checkInstall',[checkInstall::class]);
    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles()
    {
      $this->publishes([
            __DIR__.'/../Routes/web.php' => base_path('routes/web.php'),
        ],'LaraReady');
    }
}
