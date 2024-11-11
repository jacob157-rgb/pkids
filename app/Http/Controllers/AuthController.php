<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        // Validate request input
        $credentials = $request->validate([
            'qrid' => ['required', 'exists:users,qrid'],
            'password' => ['required', 'numeric'],
        ]);

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

    public function authenticateQr(Request $request): RedirectResponse
    {
        // Validate that the QR ID exists in either the users or kids table
        $credentials = $request->validate([
            'qrid' => ['required'],
        ]);

        // Check if QR ID exists in Kids or User
        $isKids = Kids::where('qrid', $credentials['qrid'])->exists();
        $isUser = User::where('qrid', $credentials['qrid'])->exists();

        if ($isKids) {
            // Log in as Kids without password
            $kidsUser = Kids::where('qrid', $credentials['qrid'])->first();
            Auth::login($kidsUser, true); // Log in and remember the session
            $request->session()->regenerate();
            return redirect()->intended('dashboard_kids');
        } elseif ($isUser) {
            // Redirect to login with PIN
            return redirect()->route('login')->withInput()->withErrors([
                'password' => 'Masukkan PIN untuk melanjutkan.',
            ]);
        }

        // If neither, return error
        return back()->withErrors([
            'qrid' => 'Hmm, kode QR-nya salah. Coba lagi, ya!',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
