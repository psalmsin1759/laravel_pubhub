<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Events\SendWelcomeEmail;

class AuthenticationController extends Controller
{
   public function register(RegisterRequest $request){

        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        event(new SendWelcomeEmail($user->email, $user->name));

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data'      => $user,
            'token' => $token
        ]);

   }

   

}