<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function resetPassword(ResetRequest $request){

        $token = $request->input('token');
       $passwordReset = DB::table('password_resets')->where('token',$token)->first();


       if(!$user = User::where('email',$passwordReset->email)->first()){

           return 'user not found';
//            throw new  NotFoundHttpException('User Not Found');
       }
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response([
            'message' =>'success'
        ]);

    }
}
