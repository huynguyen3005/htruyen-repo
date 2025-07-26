<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Providers extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\App\Repositories\Interfaces\ComicRepository::class, \App\Repositories\Eloquent\ComicRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ChapterRepository::class, \App\Repositories\Eloquent\ChapterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ComicViewRepository::class, \App\Repositories\Eloquent\ComicViewRepositoryEloquent::class);
        //:end-bindings:
    }
}
