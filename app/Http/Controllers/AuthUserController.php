<?php

namespace App\Http\Controllers;



use App\Http\Requests\LoginReq;
use App\Http\Requests\RegisterReq;
use App\Http\Requests\RegisterRequest;
use App\User;
use Exception;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{

    public function login(Request $request)
    {
       $user = User::where('email',$request->email)->first();

       if(!$user || !Hash::check($request->password,$user->password)){
           return response([
              'message' => ['password or email is invalid']
           ],404);
       }

       $token = $user->createToken('Auth-login')->plainTextToken;

       return response()->json([
           'token' =>$token
       ]);
    }

    public function register(RegisterReq $request)
    {

          User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        return response()->json([
            'success' => 200,
        ]);
    }
    public function user(){
        return auth()->user();
    }


}
