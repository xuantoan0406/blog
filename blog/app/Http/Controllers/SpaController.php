<?php

namespace App\Http\Controllers;

use App\Http\Requests\Requests\Register as RequestsRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class SpaController extends Controller
{
    public function home()
    {
        return view("homeStory");
    }

    public function index()
    {
        return view('spa');
    }
    public function register(RequestsRegister $rq)
    {
        $user = User::create([
            'name' => $rq['name'],
            'email' => $rq['email'],
            'password' => Hash::make($rq['password']),
        ]);
        return response()->json($user);
        // return response(
        //     ['user' => $user]
        // );

    }
    public function login(Request $rq)
    {
        $credentials = $rq->only('email', 'password');
        $stt = Auth::attempt($credentials);

        return response()->json($stt);
    }
    public function user()
    {
        $check = Auth::check();
        if ($check)
            $user = Auth::user();
        else
            $user = '';
        return response()->json($user);
    }
    public function logout()
    {
        Auth::logout();
    }
}
