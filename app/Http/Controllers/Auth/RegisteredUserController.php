<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()]

        ]);

        //START esta parte es para autenticarlo automaticamente
        // $user = User::create([
        //     'name'  => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password'  =>  bcrypt($request->input('password'))
        // ]);

        
        //Auth::login($user);
        // END

        User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'password'  =>  bcrypt($request->input('password'))
        ]);


        return to_route('login')->with('status', 'Account created successfully!');
    }
}
