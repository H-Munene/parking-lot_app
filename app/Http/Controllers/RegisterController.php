<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\RegistrationConfirmationEmail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        try {
            $validate_user = $request->validated();

            $user = User::create($validate_user);

            return redirect(route('login'))->with('success', 'User created successfully');

            $user->notify(new RegistrationConfirmationEmail($user));

        }catch(\Exception $e) {
            return redirect(route('register'))->withErrors();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('register');
    }
}
