<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function loginWithFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginCallBack(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateAccount($user);
        Auth::attempt([
            'email' => "$authUser->email",
            'password' => 1
        ]);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
