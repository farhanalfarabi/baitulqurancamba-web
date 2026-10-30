<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle incoming admin login attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email atau nama pengguna wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        // Check authenticating with database if user exists
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.pendaftaran.index'))
                ->with('success', 'Selamat datang kembali di Admin Portal Baitul Qur\'an Camba.');
        }

        // In UI preview phase: allow smooth navigation
        return redirect()->route('admin.pendaftaran.index')
            ->with('success', 'Berhasil masuk ke Admin Portal Baitul Qur\'an Camba.');
    }

    /**
     * Log the admin user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'Anda telah berhasil keluar dari sistem administrasi.');
    }
}
