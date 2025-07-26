@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Blog Detail</h1>
            <a href="{{ route('admin.blog.edit', $blog->id) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="fs-8 fw-semibold mb-3">{{ $blog->title }}</h2>
            </div>
            <div class="card-body border-top px-9">
                {!! $blog->content !!}
            </div>
        </div>
    </div>
@endsection
