<?php

namespace App\Jobs;

use App\Models\Comic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UpdateComicDescriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $slug;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $slugs = Comic::where("description", "=", null)
                        ->orWhere("description","=", "")
                        ->orWhere("description","=", "<p>Đang cập nhật</p>")
                        ->pluck('slug');
        foreach ($slugs as $slug) 
        {
            $apiUrl = "https://otruyenapi.com/v1/api/truyen-tranh/" . $slug;
            $res = Http::get($apiUrl);
            if ($res->successful()) 
            {
                $data = $res->json();
                $description = $data['data']['item']['content'] ?? null;
                if ($description) {
                    DB::table('comics')->where('slug', $slug)->update(['description' => $description]);
                }
            }
        }
    }
}
