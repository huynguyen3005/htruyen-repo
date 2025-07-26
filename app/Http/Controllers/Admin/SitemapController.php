<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generateSitemap()
    {
        ini_set('memory_limit', '256M');
        $sitemap = Sitemap::create();
        // Thêm URL tĩnh
        $sitemap->add(Url::create('/')->setPriority(1.0));
        $sitemap->add(Url::create('/truyen-tranh')->setPriority(0.8));
        $sitemap->add(Url::create('/top-ngay')->setPriority(0.8));
        $sitemap->add(Url::create('/top-tuan')->setPriority(0.8));
        $sitemap->add(Url::create('/top-thang')->setPriority(0.8));
        $sitemap->add(Url::create('/top-views')->setPriority(0.8));
        $sitemap->add(Url::create('/lich-su')->setPriority(0.8));

        // Lấy dữ liệu comic theo từng chunk 500 bản ghi
        Comic::chunk(500, function ($comics) use ($sitemap) {
            foreach ($comics as $comic) {
                $sitemap->add(Url::create("/truyen-tranh/{$comic->slug}")
                    ->setLastModificationDate($comic->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.9));
            }
        });

        // Lưu file sitemap.xml trong public
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return "Sitemap created!";
    }
}
