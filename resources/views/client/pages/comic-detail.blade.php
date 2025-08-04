@extends('client.layouts.main')
@section('title', $comic['name'] ?? 'ồ mai gót')
@section('meta_description', $comic['description'] ?? 'Đọc truyện tranh online')
@section('meta_keywords', $comic['meta_keywords'] ?? 'Htruyen, đọc truyện online')

@section('og_type', optional($dataAPI['seoOnPage'] ?? null)['og_type'] ?? 'default_type')
@section('og_title', optional($dataAPI['seoOnPage'] ?? null)['titleHead'] ?? 'default_title')
@section('og_description', optional($dataAPI['seoOnPage'] ?? null)['descriptionHead'] ?? 'default_description')
@section('og_image', isset($dataAPI['seoOnPage']['og_image'][0]) ? asset('uploads/' . $dataAPI['seoOnPage']['og_image'][0]) : asset('default.jpg'))
@section('og_url', isset($dataAPI['seoOnPage']['og_url']) ? url($dataAPI['seoOnPage']['og_url']) : url('/'))

@section('schema')
    @if(isset($dataAPI['seoOnPage']['seoSchema']))
        <script type="application/ld+json">
            {!! json_encode($dataAPI['seoOnPage']['seoSchema'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif
@endsection

@section('content')
    <!--=====================================-->
    <!--=         video Area Start          =-->
    <!--=====================================-->
    <section class="video sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="trailer-box">
                                <img src="{{ $comic['avatar_image'] ?? '' }}" alt="" class="image">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="trailer-content">
                                <h1>{{ $comic['name'] ?? '' }}</h1>
                                <h3 class="light-text">Chapter
                                    {{ $comic['chapters'] ? floatval(end($comic['chapters'])['chapter_name']) : '' }}
                                </h3>
                                <h2>Tóm tắt cốt truyện</h2>
                                <p>{!! $comic ? $comic['description'] : 'Đang cập nhật' !!}</p>
                                <div class="d-flex pt-4">
                                    @if ( count($comic['chapters']) > 0 )
                                        <a href="{{ route('chapter', [$comic['slug'], floatval(reset($comic['chapters'])['chapter_name'])]) }}" class="anime-btn btn-dark border-change me-3">
                                            Đọc từ đầu
                                        </a>
                                        <a href="{{ route('chapter', [$comic['slug'], floatval(end($comic['chapters'])['chapter_name'])]) }}" class="anime-btn btn-dark">
                                            Đọc mới nhất
                                        </a>
                                    @else
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="trailer-content">
                        <h3>Chi tiết truyện</h3>
                        <p><span>Trạng thái:</span> <b>{{ $comic['status'] }}</b></p>
                        <p><span>Thể loại:</span>
                            @foreach ($comic['categories'] as $index => $category)
                                <a class="fa-sm" href=""><b>{{ $category['name'] }}</b></a>
                                @if ($index < count($comic['categories']) - 1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                        <p><span>Origin Name:</span>
                            @foreach ($comic['origin_names'] as $index => $origin_name)
                                <a class="fa-sm" href=""><b>{{ $origin_name['name'] }}</b></a>
                                @if ($index < count($comic['origin_names']) - 1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                        <p><span>Views: </span> {{ $comic['views'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================-->
    <!--=         Release Area Start         =-->
    <!--=====================================-->
    <section class="relese sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h3 class="small-title">Chương ra mắt</h3>
                    @foreach (array_slice(array_reverse($comic['chapters']), 0, 10) as $chapter)
                        <h5>
                            <a class="chapter-link" href="{{ route('chapter', [$comic['slug'], floatval($chapter['chapter_name'])]) }}"
                            data-chapter-name="{{ floatval($chapter['chapter_name']) }}">
                                Chương {{ floatval($chapter['chapter_name']) }}</a>
                            <span></span>
                        </h5>
                        <hr>
                    @endforeach
                    <a href="#" class="accordion-button show-btn" data-bs-toggle="collapse" data-bs-target="#showmore"
                        aria-expanded="true" aria-controls="showmore">Show More</a>
                    <div id="showmore" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        @foreach (array_slice(array_reverse($comic['chapters']), 11) as $chapter)
                            <h5>
                                <a href="{{ route('chapter', [$comic['slug'], $chapter['chapter_name']]) }}" 
                                data-chapter-name="{{ floatval($chapter['chapter_name']) }}">
                                    Chương {{ floatval($chapter['chapter_name']) }}</a>
                                <span></span>
                            </h5>
                            <hr>
                        @endforeach
                    </div>
                </div>

                {{-- sidebar start --}}
                @include('client.layouts.comic-sidebar')
                {{-- sidebar end --}}

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const chapterLinks = document.querySelectorAll('.chapter-link');
        let currentComic = JSON.parse(localStorage.getItem(`readingHistory`));
        currentComic = currentComic.find(comic => comic.id === `{{ $comic['comic_id'] }}`);
        
        chapterLinks.forEach(link => {
            let chapterName = link.dataset.chapterName;
            if (currentComic.chapters.includes(chapterName)) {
                link.classList.add('read-chapter');
             }
            });
        });
    </script>
@endsection
