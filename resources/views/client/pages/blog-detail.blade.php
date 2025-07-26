@extends('client.layouts.main')
@push('title')
    <title>{{ $blog->title }} - {{ APP_NAME }}</title>
@endpush
@section('content')
    <section class="blog-detail sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <img alt="" src="{{ $blog->avatar_image ? url($blog->avatar_image) : '' }}" class="w-100">
                    <div class="text-details">
                        <p class="text-end author pt-3">
                            {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('l d M Y') }}
                        </p>
                        <h4>{{ $blog->title }} </h4>
                        <div>
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                @include('client.layouts.blog-sidebar')
            </div>
        </div>
    </section>
@endsection
