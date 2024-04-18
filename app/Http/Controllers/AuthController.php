<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $req = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($req)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Login successfully!');
            return redirect(route('admin-dashboard'));
        }
        Alert::error('Error', 'Username or Password is wrong!');
        return redirect(route('login'))->with('danger', 'Username or Password is wrong!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'Logout successfully');
        return redirect('/login');
    }
}
