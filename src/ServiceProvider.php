<?php namespace Nayjest\LaravelViewComponents;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Nayjest\ViewComponents\Resources\Resources;

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
            $this->package('nayjest/laravel-view-components');
            $this->app['view']->addNamespace(
                'laravel-view-components',
                $views_path
            );
        } else {
            $this->loadViewsFrom($views_path, 'laravel-view-components');
            $this->loadTranslationsFrom($pkg_path . '/resources/lang', 'grids');
            $this->publishes([
                $views_path => base_path('resources/views/nayjest/laravel-view-components')
            ]);
        }
    }

    protected function addBindings()
    {
        $this->app->singleton('js_registry', 'Nayjest\ViewComponents\Resources\AliasRegistry');
        $this->app->singleton('css_registry', 'Nayjest\ViewComponents\Resources\AliasRegistry');
        $this->app->singleton(
            'Nayjest\ViewComponents\Resources\Resources',
            function() {
                return new Resources(
                    $this->app->make('js_registry'),
                    $this->app->make('css_registry'),
                    $this->app->make(
                        'Nayjest\ViewComponents\Resources\IncludedResourcesRegistry'
                    )
                );
            }
        );
        $this->app->singleton('resources_registry', 'Nayjest\ViewComponents\Resources\Resources');
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
        return ['js_registry', 'css_registry', 'resources_registry'];
    }
}
