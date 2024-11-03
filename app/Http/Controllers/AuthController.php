<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegistrationConfirmationEmail;
use App\Notifications\LoginConfirmationEmail;

class AuthController extends Controller
{

    public function register() {

        return view('register');
    }

    public function registerPost(Request $request) {
        { try { //Validate the request
            $request->validate([
                'username' => 'required|string|max:50',
                'vehicle_lp' => 'required|string|max:8|unique:users',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|string|unique:users',
                'password' => 'required|string|min:8|confirmed',
                ]);

            // Create the user
            $user = User::create([
            'username' => $request->username,
            'vehicle_lp' => $request->vehicle_lp,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password), ]);

            // Send notification
            $user->notify(new RegistrationConfirmationEmail($user));
            // Redirect to login with success message
            return redirect(route('login'))->with('success', 'User created successfully');
        } catch (\Exception $e){
            // Redirect back with error message
            return redirect(route('register'))->with('error', 'Unable to register user');
        }
    }
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

        $credentials = $request->only("email", "password");

        if(Auth::attempt($credentials)) {
            //get user
            $user = User::where('email', $request->email)->first();
            //send user email
            $user->notify(new LoginConfirmationEmail($user));

            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with('error', 'Login Failed');
    }

}
