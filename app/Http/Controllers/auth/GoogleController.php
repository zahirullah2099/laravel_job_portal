<?php

namespace App\Http\Controllers\auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
// use Auth;

class GoogleController
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function hangleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id', $user->id)->first();
        if(!is_null($findUser)){
            Auth::login($findUser); 
        }else{
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => encrypt('123456dummy'),
                'google_id' => $user->id,
            ]);
            Auth::login($user);
        }
        return redirect()->route('account.profile');
    }
    
}
