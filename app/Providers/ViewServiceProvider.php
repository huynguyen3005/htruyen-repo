<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comic;
use Illuminate\Support\Facades\Request;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Chia sẻ dữ liệu `popularComics` với 'comic-sidebar'
        View::composer('client.layouts.comic-sidebar', function ($view) {
            $currentSlug = Request::segment(2);
            $popularComics = Comic::where('slug', '!=', $currentSlug)
                ->orderBy('views', 'desc')
                ->with('latestChapter')
                ->take(6)
                ->get();

            $view->with('popularComics', $popularComics);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
