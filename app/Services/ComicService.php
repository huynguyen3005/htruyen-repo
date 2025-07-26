<?php

namespace App\Services;

use App\Repositories\Interfaces\ComicRepository;
use App\Repositories\Interfaces\ComicViewRepository;
use Illuminate\Support\Facades\Http;

/**
 * Class ComicService.
 */
class ComicService
{
    protected $comicRepository;
    protected $comicViewRepository;
    public function __construct(ComicRepository $comicRepository, ComicViewRepository $comicViewRepository)
    {
        $this->comicRepository = $comicRepository;
        $this->comicViewRepository = $comicViewRepository;
    }


    // get data for home page
    public function getRecentlyUpdate()
    {
        return $this->comicRepository->getRecentlyUpdate()->toArray();
    }

    // get information about the comic by slug
    public function getBySlug($slug)
    {
        return $this->comicRepository->getBySlug($slug);
    }

    // get API data by slug
    public function getAPIBySlug($slug)
    {
        $response = Http::get('https://otruyenapi.com/v1/api/truyen-tranh/' . $slug);
        if ($response->successful()) {
            $response = $response->json();
            $this->comicRepository->updateDesciption($slug, $response['data']['item']['content']);
            return $response['data']['item']['chapters'];
        }

    }

    // search comic
    public function search($keyword, $genres = [], $status = [], $sortby = [])
    {
        return $this->comicRepository->search($keyword, $genres, $status, $sortby);
    }

    // get top views daily
    public function getTopViewsDaily($limit = 6)
    {
        return $this->comicViewRepository->getTopViewsDaily($limit)->toArray();
    }

    // get top views weekly
    public function getTopViewsWeekly($limit = 6)
    {
        return $this->comicViewRepository->getTopViewsWeekly($limit)->toArray();
    }

    // get top views monthly
    public function getTopViewsMonthly($limit = 6)
    {
        return $this->comicViewRepository->getTopViewsMonthly($limit)->toArray();
    }

    // get list comic
    public function getComics()
    {
        return $this->comicRepository->getComics();
    }

    // get top daily views
    public function topDay()
    {
        $comicIds = $this->comicViewRepository->topDay()->pluck('comic_id');
        $comics = $this->comicRepository->getComicsByIds($comicIds);
        return $comics;
    }

    // get top weekly views
    public function topWeek()
    {
        $comicIds = $this->comicViewRepository->topWeek()->pluck('comic_id');
        $comics = $this->comicRepository->getComicsByIds($comicIds);
        return $comics;
    }

    // get top monthly views
    public function topMonth()
    {
        $comicIds = $this->comicViewRepository->topMonth()->pluck('comic_id');
        $comics = $this->comicRepository->getComicsByIds($comicIds);
        return $comics;
    }

    // get top views
    public function topViews()
    {
        return $this->comicRepository->topViews();
    }

    // get recent completed comics taking 6 records
    public function recentCompleted()
    {
        return $this->comicRepository->recentCompleted()->toArray();
    }

    public function getListComic($Ids)
    {
        return $this->comicRepository->getListComic($Ids);
    }
}
