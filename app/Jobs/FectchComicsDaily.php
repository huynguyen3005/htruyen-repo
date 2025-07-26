<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FectchComicsDaily implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
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
        } while ($page < 3);

    }
}
