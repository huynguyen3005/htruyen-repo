<?php

namespace App\Jobs;

use App\Models\Comic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchComicPageData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $page;
    public $apiUrl;
    /**
     * Create a new job instance.
     */
    public function __construct($page, $apiUrl)
    {
        $this->page = $page;
        $this->apiUrl = $apiUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $apiUrl = "{$this->apiUrl}{$this->page}";
        $response = Http::get($apiUrl);
        if ($response->successful()) {
            $data = $response->json();
            if (!empty($data['data']['items'])) {
                $this->saveToDatabase($data['data']['items'], $data['data']['APP_DOMAIN_CDN_IMAGE']);
            }
        }
    }
    
    
    private function saveToDatabase($items, $imageDomainUrl)
    {
        // check response data status 
        foreach ($items as $item) {
            
            // save into database
            if (!DB::table('comics')->where('comic_id', $item['_id'])->exists()) {
                $comicId = DB::table('comics')->insertGetId(
                    [
                        'comic_id' => $item['_id'],
                        'name' => $item['name'],
                        'slug' => $item['slug'],
                        'avatar_image' => $imageDomainUrl . '/uploads/comics/' . $item['thumb_url'],
                        'status' => $item['status'],
                        'author' => 'Đang cập nhật',
                        'created_at' => now(),
                        'updated_at' =>  Carbon::parse($item['updatedAt']),
                        ]
                );
                
                // add the origin_names of comic
                foreach ($item['origin_name'] as $origin_name) {
                    if (!$origin_name) {
                        continue; // ignore empty origin name
                    }
                    DB::table('comic_origin_name')->updateOrInsert(
                        ['comic_id' => $item['_id']], 
                        [
                            'name' => $origin_name,
                            'created_at' => now(),
                            'updated_at' => now(),
                            ]
                        );
                    }
                    
                    // add categories of the comic
                    foreach ($item['category'] as $category) {
                    if (!$category) {
                        continue; // ignore empty category
                    }
                    DB::table('comic_category')->insert([
                        'comic_id' => $comicId,
                        'category_id' => $category['id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                // get the description of the comic
                $comicAPIUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" .  $item['slug'];
                $res = Http::get($comicAPIUrl);
                if ($res->successful()) {
                    $data = $res->json();
                    $chapters = $data['data']['item']['chapters'][0]['server_data'];
                }
            }else {
                // update the updated_at field
                $currentCM = Comic::where('comic_id', $item['_id'])->with('latestChapter')->first()->toArray();
                if(!empty($item['chaptersLatest'][0]['chapter_name']) && !empty($currentCM['latest_chapter']['chapter_name']))
                {
                    // check if the latest chapter is greater than the current chapter
                    if(floatval($item['chaptersLatest'][0]['chapter_name']) > floatval($currentCM['latest_chapter']['chapter_name']))
                    {
                        $comicAPIUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" .  $item['slug'];
                        $res = Http::get($comicAPIUrl);
                        if ($res->successful()) {
                            $data = $res->json();
                            $chapters = $data['data']['item']['chapters'][0]['server_data'];

                            // Insert chapter vào bảng chapters
                            foreach ($chapters as $chapter) {
                                // Kiểm tra nếu chapter đã tồn tại
                                if (!DB::table('chapters')->where([
                                    ['comic_id', '=', $item['_id']],
                                    ['chapter_name', '=', number_format((float) $chapter['chapter_name'], 2, '.', '')],
                                ])->exists()) {
                                    // Chèn chapter vào bảng chapters
                                    DB::table('chapters')->insert([
                                        'comic_id' => $item['_id'],
                                        'title' => $chapter['chapter_title'],
                                        'chapter_name' => $chapter['chapter_name'],
                                        'chapter_path' => $chapter['chapter_api_data'],
                                        'created_at' => now(),
                                        'updated_at' => now(),
                                    ]);
                                }
                            }
                            
                        }
                    }
                }else if(!empty($item['chaptersLatest'][0]['chapter_name']) && $currentCM['latest_chapter']== null)
                {
                    $comicAPIUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" .  $item['slug'];
                    $res = Http::get($comicAPIUrl);
                    if ($res->successful()) 
                    {
                        $data = $res->json();
                        $chapters = $data['data']['item']['chapters'][0]['server_data'];

                        // Insert chapter vào bảng chapters
                        foreach ($chapters as $chapter) {
                            // Kiểm tra nếu chapter đã tồn tại
                            if (!DB::table('chapters')->where([
                                ['comic_id', '=', $item['_id']],
                                ['chapter_name', '=', number_format((float) $chapter['chapter_name'], 2, '.', '')],
                            ])->exists()) {
                                // Chèn chapter vào bảng chapters
                                DB::table('chapters')->insert([
                                    'comic_id' => $item['_id'],
                                    'title' => $chapter['chapter_title'],
                                    'chapter_name' => $chapter['chapter_name'],
                                    'chapter_path' => $chapter['chapter_api_data'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }
                        }
                        
                    }
                }else
                {
                    // get the description of the comic
                    $comicAPIUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" .  $item['slug'];
                    $res = Http::get($comicAPIUrl);
                    if ($res->successful()) 
                    {
                        $data = $res->json();
                        $description = $data['data']['item']['content'] ?? null;
                        if($description)
                        {
                            DB::table('comics')->where('comic_id', $item['_id'])->update([
                                'description' => $description,
                                'updated_at' =>  Carbon::parse($item['updatedAt']),
                            ]);
                        }
                    }
                }
                
                // update the updated_at field
                DB::table('comics')->where('comic_id', $item['_id'])->update([
                    'status' => $item['status'],
                    'updated_at' =>  Carbon::parse($item['updatedAt']),
                ]);

            }
        }
    }
}
