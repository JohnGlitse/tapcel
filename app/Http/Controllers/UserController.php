<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    

    public function index(){
        // $users = User::all();
        // return view('products.dashboard', ['users' => $users ]);
    }
    /// DISPLAYS THE FORM FOR CREATING A NEW USER
    public function create(){
         return view('users.createUser');
    }
    
    /// CREATES A NEW USER
    public function store(Request $request){
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
//         $users = $request->validate([
//             'firstname' => ['required', 'string', 'max:50'],
//             'lastname'  => ['required', 'string', 'max:50'],
//             'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
//             'telephone' => ['required', 'string', 'regex:/^\+?[0-9]{7,20}$/', 'unique:users,telephone'],
//             'gender'    => ['required', 'in:male,female,other'],
//             'region'    => ['required', 'string', 'max:100'],
//             'address'   => ['required', 'string', 'max:255'],
//             'password'  => [
//                 'required',
//                 'string',
//                 'min:8',              // Minimum 8 characters
//                 'confirmed',          // Must match password_confirmation field
//                 'regex:/[a-z]/',      // At least one lowercase letter
//                 'regex:/[A-Z]/',      // At least one uppercase letter
//                 'regex:/[0-9]/',      // At least one digit
//                 'regex:/[@$!%*?&#]/', // At least one special character
//     ],
// ]);

        $created = User::create($users);
        
        Auth::login($created);
        return redirect('/');
       //dd('registered');
    }

    /// SHOWS A SINGE USER 
    public function show(){
        //
    }

    /// DISPLAYS THE FORM FOR UPDATING A USER
    public function edit(User $user){
        return view('users.editUser', ['user' => $user]);
    }

    /// UPDATE A SINGE USER DETAILS
    public function update(User $user, Request $request){
//       $update = $request->validate([
//             'firstname' => ['required', 'string', 'max:50'],
//             'lastname'  => ['required', 'string', 'max:50'],
//             'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
//             'telephone' => ['required', 'string', 'regex:/^\+?[0-9]{7,20}$/', 'unique:users,telephone'],
//             'gender'    => ['required', 'in:male,female,other'],
//             'region'    => ['required', 'string', 'max:100'],
//             'address'   => ['required', 'string', 'max:255'],
//             'password'  => [
//                 'required',
//                 'string',
//                 'min:8',              // Minimum 8 characters
//                 'confirmed',          // Must match password_confirmation field
//                 'regex:/[a-z]/',      // At least one lowercase letter
//                 'regex:/[A-Z]/',      // At least one uppercase letter
//                 'regex:/[0-9]/',      // At least one digit
//                 'regex:/[@$!%*?&#]/', // At least one special character
//     ],
// ]);

//  $users = $request->validate([
//             'firstname' => ['required', 'min:2', 'max:30'],
//             'lastname' => ['required', 'min:2', 'max:30'],
//             'email' => ['required', 'min:2', 'max:30'],
//             'telephone' => ['required','integer'],
//             'gender' => [],
//             'region' => ['required', 'nullable'],
//             'address' => ['required', 'min:2', 'max:100'],
//             'password' => ['required', 'min:4', 'max:16'],
//         ]);

// /// UPDATE USER DETAILS IF VALIDATED
//     User::update($users);
//     return redirect('/');
//     }

 $validated = $request->validate([
        'firstname' => ['required', 'string', 'min:2', 'max:30'],
        'lastname'  => ['required', 'string', 'min:2', 'max:30'],
        'email'     => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        'telephone' => ['required','string'],
        'gender'    => ['required'],
        'region'    => ['required'],
        'address'   => ['required', 'string', 'min:2', 'max:100'],
        'password'  => ['nullable', 'string', 'min:4', 'max:16'],  
    ]);

    // Hash password if user updated it
    if (!empty($validated['password'])) {
        $validated['password'] = bcrypt($validated['password']);
    } else {
        unset($validated['password']); // don’t overwrite with null
    }

    $user->update($validated);

    return redirect('/')->with('success', 'Profile updated successfully!');
}


    /// DELETES A SINGLE USER RECORD
    public function destroy(User $user){
        User::delete();
        dd('deleted');
    }

    // public function login(Request $request){
    //     $user = $request->validate([
    //         'email' => 'required|min:2',
    //         'password' => ['required', 'min:2', 'max:8']
    //     ]);

    //     Auth::attempt($user);
    //     return redirect('/');
    // }

    public function login(Request $request){
    $validated = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required', 'min:3'],
    ], [
        'email.exists' => 'Email is invalid.',
        //'password.exists' => 'Password is invalid'
    ]
);

    if (Auth::attempt($validated)) {
        $request->session()->regenerate();
        
        return redirect()->intended();
        
    }
    $user = Auth::user();
    return view('users.profile', compact('user'));
    // return back()->withErrors([
    //     'email' => 'The provided credentials do not match our records.',
    // ])->onlyInput('email');
}

 

public function logout(){
    Auth::logout();
    return redirect('/');
}

}


