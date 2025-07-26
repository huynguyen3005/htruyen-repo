<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Đọc truyện - ' . APP_NAME)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', 'Đọc truyện tranh online - Htruyen')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'Htruyen, truyện tranh, đọc truyện tranh online - Htruyen, truyện manga')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    {{-- web icon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/media/favicon.png') }}">
    <!-- Site Stylesheet -->
    @include('client.layouts.css')

    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Đọc Truyện",
          "headline": "Htruyen",
          "description": "Đọc truyện online miễn phí",
          "author": "Huy Nguyen"
        }
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6878376305810359"
        crossorigin="anonymous">
        </script>
</head>

<body class="sticky-header">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KPKR0RHDC5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-KPKR0RHDC5');
    </script>

    <!-- Preloader -->
    @include('client.layouts.preloader')
    <!-- Back To Top Start -->
    @include('client.layouts.back-to-top')
    <!-- Back To Top End -->

    <!-- Main Wrapper Start -->
    <div class="main-wrapper" id="main-wrapper">

        {{-- Toast Notification --}}
        @include('components.status-bar')
        <!--=        Header Area Start       	=-->
        @include('client.layouts.header');

        <p style="text-align: center; margin-top: 5px;">
            ❤️ Nếu bạn thấy trang web hữu ích, hãy click <a class="link-active"  href="https://shorten.asia/7dJX6MVd"
                target="_blank" rel="noopener noreferrer"><strong>Shopee.vn </strong></a> để ủng hộ chúng mình. Mỗi lượt click giúp
            duy trì website hoạt động!
        </p>

        <!--=        Main Content Start          =-->
        @yield('content')

        <!--=           Footer Area Start       =-->
        {!! Cache::remember('cached_footer_html', 3600 * 6, function () {
            return view('client.layouts.footer')->render();
        }) !!}

    </div>
    <!-- Jquery Js -->
    @include('client.layouts.js')
</body>

</html>