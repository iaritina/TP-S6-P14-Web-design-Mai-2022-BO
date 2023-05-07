<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return to_route('index');
    }

    public function index()
    {
        return view('index');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('content'));
        }

        return to_route('index')->withErrors([
            'email' => "Email introuvable"
        ])->onlyInput('email');
    }

    public function generate()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin.ia@gmail.com',
            'password' => Hash::make('admin')
        ]);

        return to_route('index');
    }
}
