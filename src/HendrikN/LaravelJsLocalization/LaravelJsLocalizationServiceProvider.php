<?php

namespace HendrikN\LaravelJsLocalization;

use Illuminate\Support\ServiceProvider;
use HendrikN\LaravelJsLocalization\Commands\LangJsCommand;
use HendrikN\LaravelJsLocalization\Generators\LangJsGenerator;

/**
 * The LaravelJsLocalizationServiceProvider class.
 *
 * @author Rubens HendrikN <rubens@mariuzzo.com>
 */
class LaravelJsLocalizationServiceProvider extends ServiceProvider
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
        $this->app->singleton('localization.js', function ($app) {
            $files = $app['files'];
            $langs = $app['path.base'] . '/resources/lang';
            $generator = new LangJsGenerator($files, $langs);

            return new LangJsCommand($generator);
        });

        $this->commands('localization.js');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['localization.js'];
    }
}
