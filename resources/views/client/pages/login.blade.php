@extends('client.layouts.main')
@section('content')
    <section class="login text-center">
        <div class="container">
            <div class="login-block">
                <div class="login-content">
                    <img src="assets/media/icon/user.png" alt="" class="user-icon">
                    <h3>Log in</h3>
                    <div class="login-sec">
                        <form action="{{ route('loginverify') }}" method="POST" class="form-validator">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" required
                                    placeholder="Username or email address">
                            </div>
                            <div class="form-group password-type-field mb-0">
                                <input class="form-control" type="password" id="password-field" name="password" required
                                    placeholder="Enter password">
                                <span class="text-end toggle-password" toggle="#password-field"> <i
                                        class="fal fa-eye field-icon toggle-password"></i></span>
                            </div>
                            <button type="submit" class="anime-btn btn-dark border-change mt-4">
                                Đăng nhập
                            </button>
                            <p class="hide-link">-- hoặc đăng nhập với --</p>
                            {{-- facebook google --}}
                            <p class="hide-link">
                                <a class="mx-2" href="{{ route('api.google-sign-in') }}">
                                    <img src="assets/media/login/google.png">
                                </a>
                                <a class="mx-2" href="{{ route('facebookLogin') }}">
                                    <img src="assets/media/login/facebook-icon.png">
                                </a>
                            </p>
                            <p><a href="reset-password.html">Quên mật khẩu</a></p>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" id="check">
                        <label class="custom-control-label" for="check">Lưu mật khẩu</label>
                    </div>
                    </form>
                    {{-- form end --}}
                    <p class="guide">tạo tài khoản? <a href="{{ route('signup') }}">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
