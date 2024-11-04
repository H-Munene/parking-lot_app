<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $validate_user = $request->validated();

        $user = User::create($validate_user);

        $user->notify(new RegistrationConfirmationEmail($user));

        return redirect(route('login'))->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('register');
    }
}
