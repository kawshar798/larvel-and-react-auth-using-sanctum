<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    //

    public function register(RegisterRequest  $request){

        $user =  User::create([
            'name' => $request->input(['name']),
            'email' => $request->input(['email']),
            'password' => Hash::make($request->input(['password'])),
            'active' => 1
        ]);

        return response($user, Response::HTTP_CREATED);
    }


    public function login(Request $request){

        $credentials = $request->only('email', 'password');

//        if(!Auth::attempt($request->only('email','password'))){
        if(!Auth::attempt($credentials)){
            return \response([
                'error' => 'Invalid Credintial Login',
            ],Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = \cookie('jwt',$token,60 * 24);
        return response([
            'jwt'=>$token
        ])->withCookie($cookie);
    }

    public function user(Request $request){
        return $request->user();
    }


    //logout

    public function logout(){

        $cookie = Cookie::forget('jwt');

        return \response([
            'message' =>'Successfully'
        ]);
    }

}
