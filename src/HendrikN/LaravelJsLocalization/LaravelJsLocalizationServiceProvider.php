<?php

namespace HendrikN\LaravelJsLocalization;

use HendrikN\LaravelJsLocalization\Commands\LangJsCommand;
use HendrikN\LaravelJsLocalization\Generators\LangJsGenerator;
use Illuminate\Support\ServiceProvider;

class LaravelJsLocalizationServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(LangJsGenerator::class, function ($app) {
            $files = $app['files'];
            $langs = $app['path.base'] . '/resources/lang';
            return new LangJsGenerator($files, $langs);
        });
    }

    public function boot()
    {
        $this->commands([LangJsCommand::class]);
    }

    public function provides()
    {
        return [LangJsGenerator::class];
    }
}
