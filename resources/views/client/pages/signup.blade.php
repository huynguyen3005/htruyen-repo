@extends('client.layouts.main')
@section('content')
    <section class="login signup text-center">
        <div class="container">
            <div class="login-block">
                <div class="login-content">
                    <img src="assets/media/icon/user.png" alt="" class="user-icon">
                    <h3>Đăng Ký</h3>
                    {{-- Form start --}}
                    <form action="{{ route('signupverify') }}" method="POST" class="form-validator">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" :value="old('email')" required
                                autocomplete="username" placeholder="địa chỉ email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group password-type-field mb-0">
                            <input class="form-control" type="password" id="password-field" name="password" required
                                placeholder="enter password"type="password" name="password" autocomplete="new-password">
                            <span class="text-end toggle-password" toggle="#password-field"> <i
                                    class="fal fa-eye-slash field-icon toggle-password"></i></span>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="form-group password-type-field mb-0">
                            <input class="form-control" type="password" id="confirm-password" type="password"
                                name="password_confirmation" required autocomplete="new-password" required
                                placeholder="confirm password">
                            <span class="text-end toggle-password" toggle="#confirm-password"> <i
                                    class="fal fa-eye-slash field-icon toggle-password"></i></span>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="custom-control custom-checkbox my-2">
                            <input type="checkbox" name="rememberme" class="custom-control-input" id="check">
                            <label class="custom-control-label" for="check">Lưu mật khẩu</label>
                        </div>
                        <button type="submit" class="anime-btn btn-dark border-change">
                            Đăng kí
                        </button>
                    </form>
                    <p class="guide">Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
