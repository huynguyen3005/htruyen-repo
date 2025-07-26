<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    /**
     * Display a listing of the blogs.
     */
    public function blogs()
    {
        $blogs = $this->blogService->getNewestBlogs(24);
        return view('client.pages.blogs', compact('blogs'));

    }

    /**
     * Display the specified blog.
     */
    public function show(string $slug)
    {
        $blog = $this->blogService->findBySlug($slug);
        return view('client.pages.blog-detail', compact('blog'));
    }

    /**
     * Search blogs
     */
    public function search(Request $request)
    {
        $blogs = $this->blogService->search($request->search);
        return view('client.pages.blogs', compact('blogs'));
    }
}
