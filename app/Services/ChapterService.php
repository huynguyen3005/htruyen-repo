<?php

namespace App\Services;

use App\Repositories\Interfaces\ChapterRepository;
use App\Repositories\Interfaces\ComicRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/**
 * Class ChapterService.
 */
class ChapterService
{
    protected $repository;
    protected $comicRepository;
    public function __construct(ChapterRepository $repository, ComicRepository $comicRepository)
    {
        $this->repository = $repository;
        $this->comicRepository = $comicRepository;
    }

    public function findChapter($comic, $name)
    {
        $comic = $comic = $this->comicRepository->getAAttrBySlug($comic);
        $chapter = $this->repository->findChapter($comic->comic_id, $name);
        return [
            'chapter' => $chapter->toArray(),
            'comic' => $comic->toArray(),
        ];
    }

    public function getAPIChapter($comic, $name)
    {
        $comic = $this->comicRepository->getAAttrBySlug($comic);
        $chapter = $this->repository->findChapter($comic['comic_id'], $name);
        //API link
        $apiLink = $chapter['chapter_path'];

        $response = Http::get($apiLink);
    
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        } else {
            // Xử lý lỗi khi gọi API
            throw new \Exception('Failed to fetch chapter data from API.');
        }

    }
}
