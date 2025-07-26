<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\FetchComicPageData;
use App\Jobs\UpdateComicDescriptionJob;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Update meta keywords for comic table.
     */
    public function UpdateMetaKeywords()
    {
        DB::table('comics')->select('id', 'name')
            ->where('meta_keywords', NULL)
            ->orderBy('id')
            ->chunk(100, function ($comics) {
            foreach ($comics as $comic) {
                $keywords = "đọc " . $comic->name . " truyện tranh full, " .
                            "truyện tranh " . $comic->name . " online, " .
                            $comic->name . " htruyen, " .
                            $comic->name . " full, " .
                            $comic->name . " truyện tranh hoàn, " .
                            $comic->name . " truyện tranh chương mới nhất, " .
                            $comic->name . " chương mới nhất, " .
                            $comic->name . " chapter mới nhất";
        
                DB::table('comics')
                    ->where('id', $comic->id)
                    ->update(['meta_keywords' => $keywords]);
            }
        });
        return "update successfully";
    }

    public function fetchAndStoreStories()
    {
        set_time_limit(10000);
        // calculate the number of pages
        $rootAPI = "https://otruyenapi.com/v1/api/danh-sach/truyen-moi";
        $res = Http::get($rootAPI);
        if ($res->successful()) {
            $data = $res->json();
            $totalPage = ceil($data['data']['params']['pagination']['totalItems'] / $data['data']['params']['pagination']['totalItemsPerPage']);
        }

        // insert the data into BD
        $apiUrl = "https://otruyenapi.com/v1/api/danh-sach/truyen-moi?page=";
        $page = 1;
        do {
            // dispatch by page
            FetchComicPageData::dispatch($page, $apiUrl);
            $page++;
        } while ($page < $totalPage);

        return response()->json(['message' => 'Stories fetched and stored successfully!'], 200);
    }

    public function fetchStoriesDescription()
    {
        
        UpdateComicDescriptionJob::dispatch();
        
        return "Đã dispatch job cập nhật description cho tất cả truyện!";
    }
}
