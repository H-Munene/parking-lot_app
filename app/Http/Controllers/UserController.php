<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $users = DB::table('users')->get();

        return $users;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try { //Validate the request
            $request->validate([ 'username' => 'required|string|max:50',
            'vehicle_lp' => 'required|string|max:8|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed', ]);

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

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
