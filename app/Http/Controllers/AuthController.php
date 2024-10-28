<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|max:50',
            'vehicle_lp'=>'required|string|max:7',
            'email'=> 'required|email',
            'phone_number'=> 'required|integer|unique',
            'password'=> 'required|string|max:8'
        ]);

        $user = User::create([
            'username' => $request->username,
            'vehicle_lp' => $request->vehicle_lp,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
            ]);

        return $user;
    }

    public function login() {

    }
}
