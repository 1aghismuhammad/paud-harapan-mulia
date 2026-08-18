<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\AuthenticateAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('admin.auth.login');
    }

    public function store(LoginRequest $request, AuthenticateAdmin $authenticateAdmin): RedirectResponse
    {
        $credentials = $request->validated();

        $authenticateAdmin->handle(
            email: $credentials['email'],
            password: $credentials['password'],
            ipAddress: $request->ip() ?? 'unknown',
        );

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
