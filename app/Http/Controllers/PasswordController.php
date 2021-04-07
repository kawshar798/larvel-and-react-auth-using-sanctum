<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    //
    public function forget(Request $request){

        $email = $request->input('email');
        $token = Str::random(12);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token
        ]);

        Mail::send('reset',['token' => $token],function(Message $message) use ($email){
            $message->subject('reset your pass');
            $message->to($email);
        });

        return response([
            'message' =>'Check your mail'
        ]);
    }
}
