<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        // Validate request input
        $credentials = $request->validate([
            'qrid' => ['required'],
            'password' => ['required'],
        ]);

        // Check if the qrid exists in the database
        $userExists = User::where('qrid', $credentials['qrid'])->exists();
        if (!$userExists) {
            return back()->withErrors([
                'qrid' => 'Hmm, kode QR-nya tidak terdaftar. Cek lagi ya!',
            ])->onlyInput('qrid');
        }

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'password' => 'Password salah. Coba lagi, ya!',
        ])->onlyInput('qrid');
    }
}
