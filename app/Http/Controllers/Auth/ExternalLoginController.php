<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class ExternalLoginController extends Controller
{
    public function redirect(string $provider){
        return Socialite::driver($provider)->redirect();
    }
    public function handleCallback(string $provider){
        $providerUser = Socialite::driver($provider)->user();
        $user = User::where('providerId', $providerUser->getId())->first();
        if(! $user){
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'providerId' => $providerUser->getId()
            ]);
        }
        request()->session()->regenerate();
        auth()->login($user, true);
        return redirect()->route('shop.dashboard');
    }
}
