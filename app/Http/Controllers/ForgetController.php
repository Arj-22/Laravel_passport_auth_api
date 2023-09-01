<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User; 
use App\Http\Requests\ForgetRequest; 
use Illuminate\Support\Facades\Hash; 
use Mail;
use App\Mail\ForgetMail;
use DB;

class ForgetController extends Controller
{
    //
    public function ForgotPassword(Request $request){

        $email = $request->email;

        if(User::where('email', $email)->doesntExist()){
            return response([
                "message" => "Email Invalid"
            ], 401);

        }


        $token = rand(10, 100000);
        try{

            DB::table("password_reset_tokens")->insert([
                "email" => $email,
                "token" => $token 
            ]);

            Mail::to($email)->send(new ForgetMail($token));

            return response([
                "message" => "Reset Password Link Sent"
            ],200);

        }catch(Exception $exception){
            return response([
                "message" => $exception->getMessage(),
            ], 400);
        }
    }


}
