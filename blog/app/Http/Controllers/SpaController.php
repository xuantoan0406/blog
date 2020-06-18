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
    public function login(Request $rq)
    {
        $credentials = $rq->only('email', 'password');
        $stt = Auth::attempt($credentials);
        if ($stt) {
            $add_token = User::where('email', $rq['email']);
            $add_token->update(['api_token' => Str::random(80)]);

            // $User_tk->api_token = "Str::random(80)";
            // $User_tk->save();
            $User_tk = User::where('email', $rq['email'])->first();
        }

        return response()->json($User_tk);
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
        dd(Auth::user());
        Auth::logout();
    }
}
