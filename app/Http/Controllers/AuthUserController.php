<?php

namespace App\Http\Controllers;



use App\Http\Requests\RegisterRequest;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    public function register(RegisterRequest $request){

        User::create([
            'name' => $request->input('name'),
            'email' =>$request->input('email'),
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
