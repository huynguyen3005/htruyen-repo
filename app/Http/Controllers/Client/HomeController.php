<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\ComicService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    protected $comicService;
    public function __construct(ComicService $comicService)
    {
        $this->comicService = $comicService;
    }
    public function home()
    {
        // get data recently updated comics
        $recentUpdate = Cache::remember('recentUpdate', 600, function () {
            return $this->comicService->getRecentlyUpdate();
        });

        // get top views weekly
        $topViewsWeekly = Cache::remember('topViewsWeekly', 6000, function () {
            return $this->comicService->getTopViewsWeekly();
        });

        // get top views monthly
        $topViewsMonthly = Cache::remember('topViewsMonthly', 6000, function () {
            return $this->comicService->getTopViewsMonthly();
        });

        // get recently completed comics
        $recentCompleted = Cache::remember('recentCompleted', 600, function () {
            return $this->comicService->recentCompleted();
        });
        
        return view('client.pages.home', compact('recentUpdate', 'topViewsWeekly', 'topViewsMonthly', 'recentCompleted'));
    }
}
