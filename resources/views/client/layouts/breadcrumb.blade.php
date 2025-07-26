<!--      Breadcrumb component      -->
<section class="breadcrumb ">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        @if(Request::segment(1))
            <li class="breadcrumb-item"><a href="{{ url(Request::segment(1)) }}">{{ ucfirst(Request::segment(1)) }}</a></li>
        @endif
        @if(Request::segment(2))
            <li class="breadcrumb-item"><a href="{{ url(Request::segment(1) . '/' . Request::segment(2)) }}">{{ ucfirst(Request::segment(2)) }}</a></li>
        @endif
        @if(Request::segment(3))
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(Request::segment(3)) }}</li>
        @endif
            </ul>
        </div>
    </div>
</section>
