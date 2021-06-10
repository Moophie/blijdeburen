<?php

namespace App\Http\Controllers;

use App\Classes\locationAPI;
use App\Models\Transaction;
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
        $user->profile_img = "person_placeholder.png";
        $user->city = "Unknown";
        $user->rating = 2.5;
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

    public function profile()
    {
        $data['user'] = User::find(Auth::user()->id);
        $data['uitgeleend'] = Transaction::where('user1_id', $data['user']->id)->count();
        $data['geleend'] = Transaction::where('user2_id', $data['user']->id)->count();

        return view('profile/index', $data);
    }

    public function settings()
    {
        $data['user'] = User::find(Auth::user()->id);

        return view('profile/settings', $data);
    }

    public function updateLocation(Request $request)
    {
        $user = User::find(Auth::id());
        
        $user->geolng = floatval($request->input('geolng'));
        $user->geolat = floatval($request->input('geolat'));
        $user->save();

        $city = locationAPI::coordsToCity($request->input('geolat'), $request->input('geolng'));
        if ($city != "There's a problem with the location API") {
            User::where('id', Auth::user()->id)->update(['city' => $city]);
        }

        return redirect('profile');
    }

    public function uploadProfile_img(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            User::find(Auth::id())->update(['profile_img' => $filename]);
        }

        return redirect('profile');
    }
}
