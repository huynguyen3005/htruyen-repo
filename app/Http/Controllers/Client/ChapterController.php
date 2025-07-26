<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Services\ChapterService;
use App\Services\ComicViewService;
use App\Validators\ChapterValidator;

/**
 * Class ChaptersController.
 *
 * @package namespace App\Http\Controllers;
 */
class ChapterController extends Controller
{

    protected $service;
    protected $comicViewService;

    /**
     * @var ChapterValidator
     */
    protected $validator;

    public function __construct(ChapterService $service, ChapterValidator $validator, ComicViewService $comicViewService)
    {
        $this->service = $service;
        $this->validator = $validator;
        $this->comicViewService = $comicViewService;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @param  string $comic
     *
     */
    public function show($comic, $name)
    {
        $data = $this->service->findChapter($comic, $name);
        if (!$data) {
            $chapter = [];
            $comic = [];
        } else {
            $chapter = $data['chapter'];
            $comic = $data['comic'];
            // next chapter
            $nextChapter = null;
            $previousChapter = null;
            $currentChapterName = floatval($chapter['chapter_name']);
            foreach ($comic['chapters'] as $item) {
                if (floatval($item['chapter_name']) > $currentChapterName && !$nextChapter) {
                    $nextChapter = $item;
                }
                if (floatval($item['chapter_name']) < $currentChapterName) {
                    $previousChapter = $item;
                }
            }
        }

        // Đo thời gian kết thúc
    
        return view('client.pages.chapter', compact('chapter', 'comic', 'nextChapter', 'previousChapter'));
    }

    // Api show chapter
    public function apiShow($comic, $name)
    {
        $data = $this->service->getAPIChapter($comic, $name);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Chapter not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

}

