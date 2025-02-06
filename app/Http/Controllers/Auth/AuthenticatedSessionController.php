<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View | RedirectResponse
    {
        if(Auth::guard('admin')->check())
            return redirect()->route('admin.dashboard');
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if(auth('web')->attempt($request->only(['email', 'password'])))
            return redirect()->route('dashboard');
        elseif(auth('admin')->attempt($request->only(['email', 'password'])))
            return redirect()->route('admin.dashboard');

        return back()->withErrors('Credenciais não cadastradas no sistema...');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::guard('web')->check())
            Auth::guard('web')->logout();

        if(Auth::guard('admin')->check())
            Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
