@extends('client.layouts.main')
@push('title')
    <title>Danh sách truyện - {{ APP_NAME }}</title>
@endpush
@section('content')
    <!--        filter Area Start          -->
    @include('client.layouts.filter')
    {{--  list section --}}
    <section class="anime sec-mar">
        <div class="container">
            <div class="row">
                @if (isset($comics))
                    @foreach ($comics as $item)
                        <div class="col-xl-2 col-lg-4 col-sm-3 col-6">
                            <div class="anime-blog">
                                <div class="img-block">
                                    <a href="{{ route('comic', $item->slug) }}">
                                        <img class="h-image" src="{{ $item->avatar_image }}" alt="{{ $item->name }}" />
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="tags">
                                        @if ($item->latestChapter)
                                            <a href="{{ route('chapter', ['comic' => $item->slug, 'name' => floatval($item->latestChapter->chapter_name)]) }}"
                                                class="text-box">
                                                {{ $item->latestChapter ? 'chapter ' . floatval($item->latestChapter->chapter_name) : 'Đang cập nhật' }}
                                            </a>
                                        @else
                                            <a class="text-box" href="{{ route('comic', $item->slug) }}">Đang cập nhật</a>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('comic', $item->slug) }}">
                                    <p class="fs-5">{{ Str::limit($item->name, 30) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
            </div>
            <div class="pagination-wrape">
                @if ($comics)
                    {{ $comics->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </section>
@endsection
