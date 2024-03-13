<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {
        return view('auth.create');
    }
    public function store()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = request('remember');

        if (Auth::attempt($data, $remember)) {
            request()->session()->regenerate();

            return redirect()->intended(route('jobs.index'))->with('success', 'Welcome!');
        }

        return back()->with('fail', 'Invliad credential');
    }
    public function destroy()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('jobs.index')->with('success', 'logout successfully.');
    }
}
