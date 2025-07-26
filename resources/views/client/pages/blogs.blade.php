@extends('client.layouts.main')
@push('title')
    <title>Danh sách blog - {{ APP_NAME }}</title>
@endpush
@section('content')
    <!--=====================================-->
    <!--=           Blog Area Start         =-->
    <!--=====================================-->

    <section class="blog style-1 sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if ($blogs)
                            @foreach ($blogs as $blog)
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="inner-box">
                                        <div class="image-box">
                                            <img src="{{ $blog->avatar_image ? url($blog->avatar_image) : '' }}"
                                                alt="" class="w-100 attachment-full size-full"
                                                style="width: 100%; height: 200px">
                                        </div>
                                        <div class="author-box text-start">
                                            <div class="detail d-flex align-items-center justify-content-between">
                                                <p>
                                                    {{ \Carbon\Carbon::parse($blog->updated_at)->translatedFormat('l d M Y') }}
                                                </p>
                                            </div>
                                            <h4 style="min-height: 70px">{{ Str::limit($blog->title, 50) }} </h4>
                                            <div class="d-flex align-items-center">
                                                <img style="width: 50px"
                                                    src="{{ asset('assets/media/profile/user-1.jpg') }}" alt="">
                                                <h5>
                                                    {{ $blog->author_info ? $blog->author_info->name : 'Anonymous' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                @include('client.layouts.blog-sidebar')
            </div>

            {{-- pagination --}}
            <div class="pagination-wrape">
                @if ($blogs)
                    {{ $blogs->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </section>
@endsection
