<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $attributes = $request->validate($request->rules());

        if (!Auth::attempt($attributes)) {
            return throw ValidationException::withMessages(
                [
                    'general' => 'These credentials do not match',
                ]
            );
        }
        request()->session()->regenerate();
        return redirect()->route('home');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
