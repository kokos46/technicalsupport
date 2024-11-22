<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function registerPage(){
        return view('auth.register');
    }

    public function register(Request $request){
        $login = $request->input('login');
        $password = Hash::make($request->input('password'));
        $email = $request->input('email');

        $users = DB::table('users')->where('name', $login)->first();
        if ($users != null){
            return back()->withErrors([
                'name' => 'Login need to be unique'
            ]);
        }

        $user = User::create(['name' => $login,'email'=> $email,'password'=> $password]);

        Auth::login($user);
        return redirect('/');
    }

    public function loginPage(){
        return view('auth/login');
    }

    public function login(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
