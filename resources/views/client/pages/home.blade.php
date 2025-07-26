@extends('client.layouts.home-page')
{{-- meta data --}}
@section('title', 'Đọc truyện tranh online - Htruyen')
@section('meta_description', 'Đọc truyện tranh online tại Htruyen – hàng ngàn bộ truyện hot, isekai, hành động, lãng mạn. Tải nhanh, cập nhật liên tục, trải nghiệm mượt mà!')
@section('meta_keywords', "htruyen, đọc truyện tranh, truyện tranh online, truyện isekai, truyện tổng tài, nettruyen, truyện tranh hay, truyện full, web đọc truyện, truyện hành động, truyện lãng mạn")


@section('content')
    <!--=====================================-->
    <!--=        Recent Area Start          =-->
    <!--=====================================-->
    <section class="recent sec-mar">
        <div class="container">
            <div class="heading style-1">
                <h2>Cập nhật gần đây <span>{{ \Carbon\Carbon::now()->translatedFormat('l d M Y') ?? '' }}</span></h2>
            </div>
            <div class="row">
                {{-- start lastest list --}}
                @foreach ($recentUpdate as $item)
                    <div class="col-xl-2 col-lg-4 col-sm-3 col-6">
                        <div class="anime-blog">
                            <div class="img-block">
                                <a href="{{ route('comic', $item['slug']) }}">
                                    <img class="h-image" src="{{ $item['avatar_image'] }}" alt="{{ $item['name'] }}" />
                                </a>
                            </div>
                            <div class="detail">
                                <div class="tags">
                                    @if ($item['latest_chapter'])   
                                        <a href="{{ route('chapter', ['comic' => $item['slug'], 'name' => floatval($item['latest_chapter']['chapter_name'])])  }}" class="text-box">
                                            {{ 'chapter ' . floatval($item['latest_chapter']['chapter_name']) }}
                                        </a>
                                    @else
                                        <a href="{{ route('comic', $item['slug']) }}" class="text-box">
                                            {{ 'Sắp ra mắt' }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('comic', $item['slug']) }}">
                                <p class="fs-5">{{ Str::limit($item['name'], 30) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- end lastest list --}}
            </div>
            <div class="text-center">
                <a href="{{ route('list-comics') }}" class="show-more">Xem thêm ...</a>
            </div>
        </div>
    </section>
    <!--=====================================-->
    <!--=           Top Area Start          =-->
    <!--=====================================-->
    <section class="top sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 offset-xl-0 offset-lg-0 offset-md-0 offset-sm-2 col-12">
                    <h3>Top tuần</h3>
                    @foreach ($topViewsWeekly as $index => $item)
                        @if ($index < 6)
                            <div class="anime-box bg-color-black">
                                <a href="{{ route('comic', $item['comic']['slug']) }}">
                                    <div class="row m-0">
                                        <div class="p-0 col-2">
                                            @if ($index == 0)
                                                <span class="light-text text-center color-primary">1</span>
                                            @elseif ($index == 1)
                                                <span class="light-text text-center color-purple">2</span>
                                            @elseif ($index == 2)
                                                <span class="light-text text-center color-red">3</span>
                                            @else
                                                <span class="light-text text-center">{{ $index + 1 }}</span>
                                            @endif
                                        </div>
                                        <div class="p-0 col-2">
                                            <img style="height: 100px" src="{{ $item['comic']['avatar_image'] }}"
                                                alt="{{ $item['comic']['name'] }}" />
                                        </div>
                                        <div class="p-0 col-7">
                                            <div class="anime-blog">
                                                <p>{{ $item['comic']['name'] }}</p>
                                                <p class="text">Chapter
                                                    {{ floatval($item['comic']['latest_chapter']['chapter_name']) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 offset-xl-0 offset-lg-0 offset-md-0 offset-sm-2 col-12">
                    <h3>Top tháng</h3>
                    @foreach ($topViewsMonthly as $item)
                        <div class="anime-box bg-color-black">
                            <a href="{{ route('comic', $item['comic']['slug']) }}">
                                <div class="row m-0">
                                    <div class="p-0 col-2">
                                        <img style="height: 100px" src="{{ $item['comic']['avatar_image'] }}"
                                            alt="{{ $item['comic']['name'] }}" />
                                    </div>
                                    <div class="p-0 col-9">
                                        <div class="anime-blog">
                                            <p>{{ $item['comic']['name'] }}</p>
                                            <p class="text">Chapter
                                                {{ floatval($item['comic']['latest_chapter']['chapter_name']) }}</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 offset-xl-0 offset-lg-0 offset-md-0 offset-sm-2 col-12">
                    <h3>Mới hoàn thành</h3>
                    @foreach ($recentCompleted as $item)
                        <div class="anime-box bg-color-black">
                            <a href="{{ route('comic', $item['slug']) }}">
                                <div class="row m-0">
                                    <div class="p-0 col-2">
                                        <img style="height: 100px" src="{{ $item['avatar_image'] }}" alt="{{ $item['name'] }}" />
                                    </div>
                                    <div class="p-0 col-9">
                                        <div class="anime-blog">
                                            <p>{{ $item['name'] }}</p>
                                            <p class="text">
                                                {{ $item['latest_chapter'] ? 'Chapter' . ' ' . floatval($item['latest_chapter']['chapter_name']) : 'Sắp ra mắt' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
