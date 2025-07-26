<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FaceBookController extends Controller
{
    public function getFacebookSignInUrl()
    {
        try {
            $url = Socialite::driver('facebook')->with(['prompt' => 'select_account'])->stateless()
                ->redirect()->getTargetUrl();
            return redirect($url);
        } catch (\Exception $exception) {
            return redirect('login')->with('error', $exception);
        }
    }


    public function loginCallback(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::where('facebook_id', $facebookUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect()->intended('/')->with('success', 'Đăng nhập bằng Facebook thành công');
            }
            $user = User::create(
                [
                    'email' => $facebookUser->email,
                    'name' => $facebookUser->name,
                    'facebook_id' => $facebookUser->id,
                    'password' => Hash::make($facebookUser->password),
                ]
            );
            return redirect()->intended('/')->with('success', 'Đăng nhập bằng Facebook thành công');

        } catch (\Exception $exception) {
            return redirect()->route('login')->with('error', 'Đăng nhập bằng Facebook thất bại');
        }
    }
}
