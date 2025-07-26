{{-- 2. Preload & defer mỗi file CSS --}}
<link rel="preload"
      href="{{ asset('assets/css/vendor/bootstrap.min.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">
<link rel="preload"
      href="{{ asset('assets/css/vendor/font-awesome.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">
<link rel="preload"
      href="{{ asset('assets/css/vendor/slick.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">
<link rel="preload"
      href="{{ asset('assets/css/vendor/slick-theme.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">
<link rel="preload"
      href="{{ asset('assets/css/vendor/sal.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">

{{-- Site Stylesheet --}}
<link rel="preload"
      href="{{ asset('assets/css/app.css') }}"
      as="style"
      onload="this.onload=null; this.rel='stylesheet'">

{{-- Fallback cho JS tắt --}}
<noscript>
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/sal.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</noscript>

<!-- Site Stylesheet -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://www.googletagmanager.com/gtag/js?id=UA-266165434-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-266165434-1');
</script>
