<?php

namespace Presentation\Laravel;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Presentation\Framework\Resource\AliasRegistry;
use Presentation\Framework\Resource\IncludedResourcesRegistry;
use Presentation\Framework\Resource\ResourceManager;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * This method required for backward compatibility with Laravel 4.
     *
     * @deprecated
     * @return string
     */
    public function guessPackagePath()
    {
        return __DIR__;
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $pkg_path = dirname(__DIR__);
        $views_path = $pkg_path . '/resources/views';

        # only for Laravel 4 & some of 5-dev
        if (version_compare(Application::VERSION, '5.0.0', '<')) {
            $this->package('presentation/laravel');
            $this->app['view']->addNamespace(
                'presentation',
                $views_path
            );
        } else {
            $this->loadViewsFrom($views_path, 'presentation');
            $this->loadTranslationsFrom($pkg_path . '/resources/lang', 'presentation');
            $this->publishes([
                $views_path => base_path('resources/views/presentation/laravel')
            ]);
        }
    }

    protected function addBindings()
    {
        $this->app->singleton('js_registry', AliasRegistry::class);
        $this->app->singleton('css_registry', AliasRegistry::class);
        $this->app->singleton(
            ResourceManager::class,
            function() {
                return new ResourceManager(
                    $this->app->make('js_registry'),
                    $this->app->make('css_registry'),
                    $this->app->make(
                        IncludedResourcesRegistry::class
                    )
                );
            }
        );
        $this->app->singleton('resource_manager', ResourceManager::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->addBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['js_registry', 'css_registry', 'resource_manager'];
    }
}
