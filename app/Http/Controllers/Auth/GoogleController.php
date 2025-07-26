<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        try {
            $url = Socialite::driver('google')->with(['prompt' => 'select_account'])->stateless()
                ->redirect()->getTargetUrl();
            return redirect($url);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginCallback(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect()->intended('/')->with('success', 'Đăng nhập bằng Google thành công');
            }
            $user = User::create(
                [
                    'email' => $googleUser->email,
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make($googleUser->password),
                ]
            );
            return redirect()->intended('/')->with('success', 'Đăng nhập bằng Google thành công');

        } catch (\Exception $exception) {
            return redirect()->route('login')->with('error', 'Đăng nhập bằng Google thất bại');
        }
    }
}