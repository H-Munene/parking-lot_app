<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|max:50',
            'vehicle_lp'=>'required|string|max:8|unique:users',
            'email'=> 'required|email|unique:users',
            'phone_number'=> 'required|string|unique:users',
            'password'=> 'required|string|max:8'
        ]);

        $user = User::create([
            'username' => $request->username,
            'vehicle_lp' => $request->vehicle_lp,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
            ]);

        return response()->json([
            'user' =>$user,
            'token'=>$user->createToken('token-name')->plainTextToken
        ],201);
    }

    public function login(Request $request) {
         //ensure its formatted as email and password
         $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'error' => ['credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'Status' => 'Logged in',
            'user' => $user,
            'token' => $user->createToken('token-name')->plainTextToken,
        ]);
    }
}
