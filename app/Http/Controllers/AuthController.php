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
            // 'username' => ,
            // 'vehicle_lp'=>,
            // 'email'=>,
            // 'phone_number'=>,
        ]);
    }

    public function login() {

    }
}
