<footer class="footer">
    <div class="footer-main style-1">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-sm-12 col-12">
                    <div class="footer-widget">
                        <a href="{{ route('home') }}">
                            <img alt="" src="{{ asset(LOGO_LINK) }}">
                        </a>
                        <p class="mb-5">Htruyen là trang web đọc truyện tranh trực tuyến, nơi bạn có thể khám phá hàng
                            ngàn bộ truyện hấp dẫn thuộc nhiều thể loại như hành động, phiêu lưu, lãng mạn, isekai, kinh
                            dị và hơn thế nữa. Với giao diện thân thiện, tốc độ tải nhanh và cập nhật liên tục, Htruyen
                            mang đến trải nghiệm đọc mượt mà, giúp bạn thỏa mãn đam mê truyện tranh mọi lúc, mọi nơi!.
                        </p>
                        <h6 class="mb-2">Join Us on</h6>
                        <ul class="social-icons">
                            {{-- <li><a href="#"><img alt=""
                                        src="{{ asset('assets/media/footer/reddit.png') }}"></a></li>
                            <li><a href="#"><img alt=""
                                        src="{{ asset('assets/media/footer/discord.png') }}"></a></li>
                            <li><a href="#"><img alt=""
                                        src="{{ asset('assets/media/footer/instagram.png') }}"></a></li> --}}
                            <li><a href="https://www.facebook.com/profile.php?id=61576850597165"><img alt=""
                                        src="{{ asset('assets/media/footer/twitter.png') }}"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 col-12">
                    <div class="footer-widget align-middle">
                        <h6>Nhận thông báo</h6>
                        <p class="light-text">Nhận email thông tin mới về truyện và thông tin khác.</p>
                        <form action="https://uiparadox.co.uk/public/templates/animeloop/v2/demo/home.html">
                            <div class="input-group form-group footer-email-box">
                                <input class="form-control" type="email" name="email" placeholder="info@example.com"
                                    required>
                                <button class="input-group-text anime-btn" type="submit">Subscribe</button>
                            </div>
                        </form>
                        <p class="text">Nhận góp ý về nội dung trang web qua huytdhd@gmai.com</p>
                        <p class="text">Chúng tôi luôn sẵn sàng lắng nghe mọi ý kiến đóng góp của độc giả.</p>
                        <div>
                            @foreach (\DB::table('categories')->get() as $category)
                                <a class="anime-btn2 light me-3 mb-0" href="{{ route('comic.search', ['genre' => [$category->category_id]]) }}" >
                                    {{ Str::limit($category->name, 30) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-color-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="footer-copyright">
                        <span class="copyright-text">© 2024 All rights reserved by <a
                                href="#">{{ APP_NAME }}</a>.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="footer-bottom-link text-end">
                        <a href="#">Privacy Policy</a>
                        <a href="#" class="ps-2">Comments Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
