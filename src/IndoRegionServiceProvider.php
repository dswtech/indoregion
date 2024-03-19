<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion;

use Illuminate\Support\ServiceProvider;

class IndoRegionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config' => $this->app->basePath('config'),
            ], 'indoregion-config');

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/indoregion.php', 'indoregion');

        $this->app->singleton(Contracts\IndoRegionResolver::class, Actions\IndoRegionResolver::class);
    }
}
