<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

use Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request){
        return Socialite::driver('google')->redirect();
    }
 
    public function handleGoogleCallback(Request $request){
        $user = Socialite::driver('google')->user();

        // Try to find the user by google_id
        $finduser = User::where('google_id', $user->getId())->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect('/'); 
        } else {
            // Split full name into first and last
            $fullName = explode(' ', $user->getName(), 2);
            $firstname = $fullName[0];
            $lastname = $fullName[1] ?? '';

            $finduser = User::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => encrypt('1234'), // Or use Hash::make()
            ]);

            Auth::login($finduser);
        }

       return redirect()->route('profile');
    
    }

}
