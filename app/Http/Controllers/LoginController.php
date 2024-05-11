<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function loginWithFacebook(){
        // return session()->getId();
        logger()->debug(session()->getId());
        return Socialite::driver('facebook')->redirect();
    }

    public function loginCallBack(Request $request){
       try {
        $user = Socialite::driver('facebook')->user();
        dd($user);
       } catch (InvalidStateException $e) {
        dd($e);
       }
       
    }
}
