<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Notifications\LoginConfirmationEmail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show() : View
    {
        return view('login');
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only("email", "password");

        if(!Auth::validate($credentials)) :
            return redirect()->to('login')->with('error', 'Invalid Credentials');
        endif;

        /*
         * Auth::getProvider():
         *  This gets the user provider configured for the authentication guard
         *  being used (typically the default guard, which is users)
         *
         * retrieveByCredentials($credentials):
            This method fetches a user from the user provider based on the given credentials.
            The $credentials array usually includes data like email and password.
         */
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->intended(route('home'));

        //send login email
        $user->notify(new LoginConfirmationEmail($user));
    }


}
