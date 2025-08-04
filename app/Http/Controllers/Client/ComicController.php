<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\ComicService;
use App\Services\ComicViewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComicController extends Controller
{
    protected $comicService;
    protected $comicViewService;
    // constructor
    public function __construct(ComicService $comicService, ComicViewService $comicViewService)
    {
        $this->comicService = $comicService;
        $this->comicViewService = $comicViewService;
    }

    // Display the specified comic.
    public function show($slug)
    {
        $description = "";
        $dataAPI = "";

        // get comic detailss from API
        $apiUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" . $slug;
        $res = Http::get($apiUrl);
        if ($res->successful()) 
        {
            // dd($res->json()['data']);
            $dataAPI = $res->json()['data'];
        }
        $comic = $this->comicService->getBySlug($slug);
        if (!$comic) {
            $comic = [];
        } else {
            $comic = $comic->toArray();
            $description = $comic['description'];
        }

        return view('client.pages.comic-detail', compact('comic', 'description', 'dataAPI'));
    }

    // Display a listing of the comics.
    public function list()
    {
        $comics = $this->comicService->getComics();
        return view('client.pages.list', compact('comics'));
    }

    public function updateView(Request $request)
    {
        $comicId = $request->input('comic_id');
        $this->comicViewService->updateView($comicId);
        return response()->json(['success' => true]);
    }

    // Search comic .
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $genres = $request->input('genre', []);
        $status = $request->input('status', '');
        $sortby = $request->input('sortby', '');
        $comics = $this->comicService->search($keyword, $genres, $status, $sortby);
        // dd($comics);
        return view('client.pages.list', compact('comics'));
    }

    // top days of comic
    public function topDay()
    {
        $comics = $this->comicService->topDay();
        return view('client.pages.list', compact('comics'));
    }

    // top weeks of comic
    public function topWeek()
    {
        $comics = $this->comicService->topWeek();
        return view('client.pages.list', compact('comics'));
    }

    // top months of comic
    public function topMonth()
    {
        $comics = $this->comicService->topMonth();
        return view('client.pages.list', compact('comics'));
    }

    // top views of comic
    public function topViews()
    {
        $comics = $this->comicService->topViews();
        return view('client.pages.list', compact('comics'));
    }

    public function history()
    {
        return view('client.pages.histories');
    }

    public function getListComic(Request $request)
    {
        $Ids = $request->input('ids');
        // convert string to array
        if (is_string($Ids)) {
            $Ids = explode(',', $Ids);
        }
        $comics = $this->comicService->getListComic( $Ids);
        return $comics;
    }
}
