<?php

namespace App\Http\Controllers;

use App\Classes\locationAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function handleSignup(Request $request)
    {
        $user = new User();

        // Check if email is unique
        $email = $user::where('email', $request->input('email'))->first();
        if ($email) {
            $request->session()->flash('error', 'Email is already in use');

            return view('signup');
        }

        // Check if both passwords are the same
        if ($request->input('password') != $request->input('confirmPassword')) {
            $request->session()->flash('error', 'Passwords are not the same');

            return view('signup');
        }

        // Set object properties from the user input
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password with BCRYPT
        $user->city = "Mechelen";
        $user->geolat = 51.2167;
        $user->geolng = 4.4667;
        $user->save();

        return redirect('signin');
    }

    public function signin()
    {
        return view('signin');
    }

    public function handleSignin(Request $request)
    {
        // Get the user's email and password and put them in an array
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        };

        $request->session()->flash('error', 'Something went wrong');

        return view('signin');
    }

    public function handleLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile(){
        $data['user'] = User::find(Auth::user()->id);

        return view('profile/index', $data);
    }

    public function updateLocation(Request $request){

        User::where('id', Auth::user()->id)->update(['geolng' => $request->input('geolng'), 'geolat' => $request->input('geolat')]);

        $city = locationAPI::coordsToCity($request->input('geolat'), $request->input('geolng'));
        $city = $city['address']['town'];
        User::where('id', Auth::user()->id)->update(['city' => $city]);

        return redirect('profile');
    }
}
