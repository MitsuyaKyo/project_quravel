<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class userController extends Controller
{

    public function registUser(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:255',

        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        Session::flash('flash_message', 'Registration successfull! Please login');
        return redirect('/login');
    }
    public function loginUser(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('loginError','Email or password must be incorrect!');
    }

    public function logoutUser(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
