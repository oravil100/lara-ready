<?php

namespace Oravil\LaravelReady\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Oravil\LaravelReady\Middleware\checkInstall;

class LaravelReadyServiceProvider extends ServiceProvider
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
        ],'LaravelReady');
    }
}
