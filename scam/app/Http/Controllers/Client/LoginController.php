<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function loginWithGoogle(Request $request)
    {
        session(['url' => url()->previous()]);
        return Socialite::driver('google')->redirect();
    }

    public function callBackGoogle(Request $request)
    {
        $url = session('url');
        $user = Socialite::driver('google')->user();
        $findUser = Account::where('google_id', $user->id)->first();
        if ($findUser) {
            Auth::attempt([
                'email' => "$user->email",
                'password' => 1,
                'google_id' => $user->id,
            ]);
            if (Auth::user()->ban == 1) {
                Auth::logout();
                return redirect($url)->with('ban', '1');
            }
            Account::where(['google_id' => $user->id])->update([
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]);
            return redirect($url);
        } else {
            Account::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
            ]);
        }
        return redirect($url);
    }

    public function loginWithFacebook(Request $request)
    {
        session(['url' => url()->previous()]);

        return Socialite::driver('facebook')->redirect();
    }

    public function loginCallBack(Request $request)
    {
        $url = session('url');
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateAccount($user);
        Auth::attempt([
            'email' => "$authUser->email",
            'password' => 1,
            'uid' => $authUser->uid,
        ]);
        if (Auth::user()->ban == 1) {
            Auth::logout();
            return redirect($url)->with('ban', '1');
        }
        return redirect($url);
    }

    public function logOut()
    {
        Auth::logout();
        $url = session('url');

        return redirect($url);
    }

    protected function findOrCreateAccount($facebookUser)
    {
        $user = Account::where('email', $facebookUser->email)->first();

        if (!$user) {
            $user = Account::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'uid' => $facebookUser->id,
                'avatar' => $facebookUser->avatar,
            ]);
        } else {
            Account::where(
                'uid',
                $facebookUser->id
            )
                ->update([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'avatar' => $facebookUser->avatar,
                ]);
        }

        return $user;
    }
}
