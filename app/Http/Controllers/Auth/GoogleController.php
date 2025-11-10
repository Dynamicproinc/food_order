<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
           $randomPassword = Str::random(12);

$googleUser = Socialite::driver('google')
    ->scopes(['openid', 'profile', 'email'])
    ->stateless()
    ->user();
    dd($googleUser);

$user = User::updateOrCreate(
    ['email' => $googleUser->getEmail()],
    [
        'name' => $googleUser->getName(),
        'last_name' => " ",
        'google_id' => $googleUser->getId(),
        'avatar' => $googleUser->getAvatar(),
        'password' => bcrypt($randomPassword),
    ]
);

if (!$user->email_verified_at) {
    $user->email_verified_at = now();
    $user->save();
}

            Auth::login($user);

            return redirect('/home');
        } catch (Exception $e) {
            // dd($e->getMessage());
             return redirect()->route('login')->with('error', 'Google login failed or was canceled.');
        }
    }
}
