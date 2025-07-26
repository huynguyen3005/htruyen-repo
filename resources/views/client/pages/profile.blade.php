@extends('client.layouts.main')
@push('title')
    <title>Trang cá nhân - {{ APP_NAME }}</title>
@endpush
@section('content')
<!--=====================================-->
        <!--=      Profile Area Start        =-->
        <!--=====================================-->
        <section class="profile sec-mar mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-12">
                        <div class="row align-items-center pb-5">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="img-box mb-4">
                                    <img src="assets/media/profile/profile.png" alt="" class="w-100">
                                </div>
                            </div>
                            <div class="profile-seting col-lg-8 col-sm-6 col-12">
                                <h5>{{ auth()->user()->name }}</h5>
                                <p>{{ 'Phone : ' . (auth()->user()->phone ? auth()->user()->phone : 'chưa cập nhật') }}</p>
                                <p class="pb-3">{{ auth()->user()->email }}</p>
                                <a href="edit-profile.html" class="anime-btn btn-dark border-change">
                                    Chỉnh sửa thông tin
                                </a>
                                <div class="footer-widget text-start p-0 mb-sm-0 mb-4">
                                    <p class="mb-1">Join Us on</p>
                                    <ul class="social-icons">
                                        <li><a href="#"><img alt="" src="assets/media/footer/reddit.png"></a></li>
                                        <li><a href="#"><img alt="" src="assets/media/footer/discord.png"></a></li>
                                        <li><a href="#"><img alt="" src="assets/media/footer/instagram.png"></a></li>
                                        <li><a href="#"><img alt="" src="assets/media/footer/twitter.png"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-0 col-sm-8 offset-sm-2 col-12">
                        <div class="profile-link bg-color-black">
                            <h5>Links</h5>
                            <a href="{{ route('comic.history') }}" class="pb-3">Lịch sử đọc</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
