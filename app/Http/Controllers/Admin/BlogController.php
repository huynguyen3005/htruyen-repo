<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->getNewestBlogs(24);
        return view('admin.pages.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blogs.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $post = $request->only(['title']);
            $post['author'] = auth()->id();
            $post['content'] = '';
            $post['slug'] = Str::slug($request->title);
            $blog = Blog::create($post);
            $postId = $blog->id;
            $content = $request->content;

            // Tìm tất cả ảnh base64 trong nội dung blog
            preg_match_all('/src="data:image\/(.*?);base64,(.*?)"/', $content, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $imageType = $match[1]; // Loại ảnh (jpeg, png, etc.)
                $imageData = base64_decode($match[2]); // Giải mã base64

                // Tạo tên file duy nhất
                $fileName = 'blogs/' . $postId . str::random(10) . '.' . $imageType;

                // Lưu ảnh vào storage
                Storage::put("public/$fileName", $imageData);

                // Tạo URL ảnh mới
                $imageUrl = url(Storage::url($fileName));

                // Thay thế ảnh base64 trong nội dung
                $content = str_replace($match[0], 'src="' . $imageUrl . '"', $content);
            }


            if ($request->hasFile('avatar')) {
                $avatar_image = Storage::putFile('public/blogs/' . $postId, $request->file('avatar'));
                $avatar_image = str_replace('public/', 'storage/', $avatar_image);    
                $avatar_image =  url($avatar_image);
                $blog->update(['avatar_image' => $avatar_image]);

            }

            $blog->update(['content' => $content]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error creating blog');
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = $this->blogService->findById($id);
        return view('admin.pages.blogs.detail', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = $this->blogService->findById($id);
        return view('admin.pages.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $blog = $this->blogService->findById($id);
            $post = $request->only(['title']);
            $post['slug'] = Str::slug($request->title);

            if ($request->hasFile('avatar')) {
                $avatar_image = Storage::putFile('storage/blogs/' . $id, $request->file('avatar'));
                $post['avatar_image'] = $avatar_image;
            }

            $content = $request->content;

            // Tìm tất cả các chuỗi src="data:image/...;base64,..." trong nội dung blog
            preg_match_all('/src="data:image\/(.*?);base64,(.*?)"/', $content, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $imageType = $match[1]; // Loại ảnh (jpeg, png, etc.)
                $imageData = base64_decode($match[2]); // Giải mã base64

                // Tạo tên file duy nhất
                $fileName = 'blogs/' . $id . Str::random(10) . '.' . $imageType;

                // Lưu ảnh vào storage
                Storage::put("storage/$fileName", $imageData);

                // Tạo URL ảnh mới với link gốc của project
                $imageUrl = url(Storage::url($fileName));

                // Thay thế ảnh base64 trong nội dung
                $content = str_replace($match[0], 'src="' . $imageUrl . '"', $content);
            }

            $blog->update($post);
            $blog->update(['content' => $content]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating blog');
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/uploads');

            return response()->json(['location' => url(Storage::url($path))]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
