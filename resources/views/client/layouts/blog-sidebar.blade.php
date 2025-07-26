<div class="col-lg-4">
    <div class="card blog-sidebar">
        <div class="card-body bg-color-black">
            <form method="get" action="{{ route('blogs.search') }}">
                <div class="input-group form-group mb-4">
                    <input class="form-control" name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}"
                        placeholder="Tìm kiếm ...">
                    <button class="input-group-text promee-btn btn-fill-primary  ps-3 pe-3" type="submit"><i
                            class="fal fa-search"></i></button>
                </div>
            </form>
            <h5 class="mb-3">Tags</h5>
            <ul class="tags">
                <li><a href="#">Anime</a></li>
                <li><a href="#">Shounen</a></li>
                <li><a href="#">Super Hero</a></li>
                <li><a href="#">Fantasy</a></li>
            </ul>
            <h5 class="mb-3 mt-4">Blog nổi bật</h5>

            @if ($popularBlogs)
                @foreach ($popularBlogs as $blog)
                    <div class="anime-box bg-color-black">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <div class="row m-0">
                                <div class="p-0 col-5">
                                    <img src="{{ $blog->avatar_image ? url($blog->avatar_image) : '' }}"
                                        style="width: 144px; height: 96px;" />
                                </div>
                                <div class="p-0 col-7">
                                    <div>
                                        <div class="p-0 show-type">
                                            {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('l d M Y') }}
                                        </div>
                                        <p>{{ Str::limit($blog->title, 60) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            <h5 class="mb-2 mt-5">Categories</h5>
            <ul class="small-tag">
                <li><a href="#"> Anime</a></li>
                <li><a href="#"> Cosplay</a></li>
                <li><a href="#"> Manga</a></li>
                <li><a href="#"> Light Novel</a></li>
            </ul>
        </div>
    </div>
</div>
