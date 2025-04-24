<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class facebookController
{
    public function redirectToFacebook()
    {
        // return Socialite::driver('facebook')->redirect();
        return Socialite::driver('facebook')
    ->scopes(['email']) // request email explicitly
    ->redirect();

    }
    


    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();
        // dd($user);
        $findUser = User::where('facebook_id', $user->id)->first();
        if(!is_null($findUser)){
            Auth::login($findUser); 
        }else{
            $user = User::create([
                'name' => $user->name,
                'email' => 'dummy@gmail.com',
                'password' => encrypt('123456dummy'),
                'facebook_id' => $user->id,
            ]);
            Auth::login($user);
        }
        return redirect()->route('account.profile');
    }
    
}
