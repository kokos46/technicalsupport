<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\get;

class UserController extends Controller
{
    public function register(Request $request){
        $login = request('login');
        $password = request('password');

        DB::table('users')->insert([
            'name' => $login,
            'password' => $password,
            'created_at' => now(),
            'email' => request('email')
        ]);

        setcookie('login', $login, 0, "/");
        setcookie('password', $password, 0, "/");
        return view('index');
    }

    public function login(Request $request){
        $login = request('login');
        $password = request('password');
        $user = DB::table('users')->where('name', $login)->first();
        if (!empty($user)){
            if (password_verify($password, $user->password)){
                return view('index');
            }
        }
    }
}
