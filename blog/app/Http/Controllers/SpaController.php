<?php

namespace App\Http\Controllers;

use App\Http\Requests\Requests\Register as RequestsRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

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

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->user()->forceFill(['api_token' => Str::random(80)])->save();
        }
        return response(['user' => $request->user()]);
    }
}
