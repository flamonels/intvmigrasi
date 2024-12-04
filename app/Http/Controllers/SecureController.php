<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SecureController extends Controller
{
    public function index()
	{
		return view('secure/login');
	}

    // proses login
    function login(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
            // return redirect()->route('dashboard');
            // return redirect('dashboard');
        }

        return back()->with('loginFailed', 'The provided credentials do not match our records.');
    }

    function register()
    {
        return view('secure.register');
    }

    public function register_user(request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $res = DB::table('users')->insert([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'created_at' => now(),
			'created_by' => 1,
			'updated_at' => now()
		]);
        if ($res)
        {
            return back()->with('success', 'You have registered successfully');
        }
        else
        {
            return back()->with('fail', 'Something went wrong, user registration failed.');
        }
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}