<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegistrationConfirmationEmail;
use App\Notifications\LoginConfirmationEmail;

class AuthController extends Controller
{

    public function register() {

        return view('register');
    }

    public function registerPost(Register $register) {

        try {
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

            $user->notify(new RegistrationConfirmationEmail($user));

            return redirect(route('login'))->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect(route('register'))->with('error', 'Unable to register user');
        }

        // return response()->json([
        //      'user' =>$user,
        //      'token'=>$user->createToken('token-name')->plainTextToken
        // ],201);
    }

    //retrieve login view
    public function login() {
        return view('login');
    }

    public function loginPost(Request $request) {
        //email, password validation
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);




        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

        }

        //send login confirmation email
        $user->notify(new LoginConfirmationEmail($user));

         return response()->json([
             'Status' => 'Logged in',
             'user' => $user,
             'token' => $user->createToken('token-name')->plainTextToken,
         ], 200);
    }
}
