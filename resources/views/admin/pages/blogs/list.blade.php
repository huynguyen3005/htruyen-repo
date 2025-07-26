@extends('admin.layouts.main')
@section('content')
    <div class="row">
        @if ($blogs)
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="card rounded-2 overflow-hidden hover-img">
                        <div class="position-relative">
                            <a href="{{ route('admin.blog.show', $blog->id) }}">
                                <img src="{{ $blog->avatar_image ? url($blog->avatar_image) : '' }}"
                                    class="card-img-top rounded-0" alt="..." height="220px">
                            </a>
                            <img src="{{ asset('assets/media/profile/user-1.jpg') }}" alt=""
                                class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9"
                                width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Addie Keller">
                        </div>
                        <div class="card-body p-4">
                            <a class="d-block my-4 fs-5 text-dark fw-semibold"
                                href="{{ route('admin.blog.show', $blog->id) }}">{{ $blog->title }}
                            </a>
                            <div class="d-flex align-items-center gap-4">
                                <div class="d-flex align-items-center fs-2 ms-auto"><i
                                        class="ti ti-point text-dark"></i>{{ $blog->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
