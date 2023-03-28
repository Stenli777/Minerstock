<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
//        $credentials['password'] = \Hash::make($credentials['password']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'name'           => ['required'],
            'email'           => ['required', 'email'],
            'password'        => ['required'],
            'passwordConfirm' => ['required'],
        ]);

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user) {
            return response()->json([
                'error' => ['email' =>'Email is used'],
            ], 403);
        }

        if ($credentials['password'] !== $credentials['passwordConfirm']) {
            return response()->json([
                'error' => ['password' => 'Passwords don\'t match'],
            ], 403);
        }

        $user = new \App\Models\User($credentials);
        $user->save();

        return response()->json(['user' => $user]);
    }
}
