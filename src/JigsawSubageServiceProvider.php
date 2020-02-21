<?php

namespace jwwisniewski\Jigsaw\News;

use Illuminate\Support\ServiceProvider;

class JigsawSubageServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../resources/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../resources/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'jigsaw-news');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }

}