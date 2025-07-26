<?php

namespace App\Services;

use App\Repositories\Interfaces\ComicRepository;
use App\Repositories\Interfaces\ComicViewRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ComicViewService.
 */
class ComicViewService
{
    protected $repository;
    protected $comicRepository;

    public function __construct(ComicViewRepository $repository, ComicRepository $comicRepository)
    {
        $this->repository = $repository;
        $this->comicRepository = $comicRepository;
    }

    // update view count
    public function updateView($comicId)
    {
        // update view count in comics table
        DB::table('comics')->where('comic_id', $comicId)->increment('views');
        
        // update view count in comic_view table if not exist
        $comicView = $this->repository->findByComicId($comicId);
        if ($comicView) {
            $comicView->increment('views_daily');
            $comicView->increment('views_weekly');
            $comicView->increment('views_monthly');
            $comicView->increment('total_views');
            $comicView->save();

        } else {
            $this->repository->create([
                'comic_id' => $comicId,
                'views_daily' => 1,
                'views_weekly' => 1,
                'views_monthly' => 1,
            ]);
        }
    }

    // get top views daily
    public function getTopViewsDaily($limit = 6)
    {
        return $this->repository->getTopViewsDaily($limit)->toArray();
    }
}
