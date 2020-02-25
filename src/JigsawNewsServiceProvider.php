<?php

namespace jwwisniewski\Jigsaw\News;

use Illuminate\Support\ServiceProvider;
use jwwisniewski\Jigsaw\Core\Jigsaw;
use jwwisniewski\Jigsaw\Core\Module;

class JigsawNewsServiceProvider extends ServiceProvider
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
    public function boot(Jigsaw $jigsaw)
    {
        $this->loadRoutesFrom(__DIR__.'/../resources/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../resources/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'jigsaw-news');
        $this->loadTranslationsFrom(__DIR__.'/../resources/translations', 'jigsaw-news');

        $jigsaw->registerModule(News::class, 'news', 'news.index', Module::INSTANTIABLE);
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
