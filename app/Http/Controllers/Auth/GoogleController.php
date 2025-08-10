<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request){
        return Socialite::driver('google')->redirect();
    }
    // public function handleGoogleCallback(Request $request){

    //     $user = Socialite::driver('google')->user();
    //      dd($user);
    //     // $finduser = User::where("google_id", $user->id)->first();
    //     $finduser = User::where('google_id', $user->getId())->first();

          
    //      if($finduser){
    //         Auth::login($finduser);
    //     }else{
    //         $fullName = explode(' ', $user->getName(), 2);
    //         $firstname = $fullName[0];
    //         $lastname = $fullName[1] ?? '';

    //        $finduser = User::create([
    //             'firstname' => $user->$firstname,
    //             'lastname' => $user->$lastname,
    //             'email'=> $user->getEmail(),
    //             'telephone' => $user->telephone,
    //             'gender' => $user->gender,
    //             'region' => $user->region,
    //             'address' => $user->address,
    //             'google_id' => $user->getId(),
    //             'password' => encrypt('1234'),
    //         ]);
    //          Auth::login($finduser);
    //     }
    //     return redirect('/');
//}




public function handleGoogleCallback(Request $request)
{
    $user = Socialite::driver('google')->user();

    // Try to find the user by google_id
    $finduser = User::where('google_id', $user->getId())->first();

    if ($finduser) {
        Auth::login($finduser);
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

    return redirect('user.updateGoogle');
  
 }




 //// UPDATING USER INFO FROM GOOGLE SIGN UP
public function edit(User $user){
    return view('users.updateGoogle', ['user'=> $user]);
}

public function update(User $user, Request $request){
 

 $users = $request->validate([
            'firstname' => ['required', 'min:2', 'max:30'],
            'lastname' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'min:2', 'max:30', 'unique:users,email'],
            'telephone' => ['required','integer'],
            'gender' => ['required'],
            'region' => ['required'],
            'address' => ['required', 'min:2', 'max:100'],
            'password' => ['required', 'min:4', 'max:16'],
        ]);

/// UPDATE USER DETAILS IF VALIDATED
    User::update($users);
    dd('Updated');
    }


}
