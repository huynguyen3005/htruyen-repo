<div class="col-lg-4 col-md-6 col-sm-8 offset-lg-0 offset-md-3 offset-sm-2 mt-lg-0 mt-3">
    <h3 class="small-title">Truyện hot</h3>
    @foreach ($popularComics as $comic)
        <div class="anime-box bg-color-black">
            <a href="{{ route('comic', $comic->slug) }}">
                <div class="row m-0">
                    <div class="p-0 col-2">
                        <img src="{{ $comic->avatar_image }}" alt="">
                    </div>
                    <div class="p-0 col-9">
                        <div class="anime-blog">
                            <p>{{ $comic->name }}</p>
                            <p class="text-box">
                                {{ $comic->latestChapter ? 'Chapter ' . floatval($comic->latestChapter->chapter_name ): '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
