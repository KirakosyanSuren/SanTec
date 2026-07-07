<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function __construct(
        private AuthService $authService
    ) {}

    public function showLogin(): View
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login(
            $request->validated()
        );

        if (!$result) {
            return back()->withErrors([
                'email' => 'Սխալ էլ․ հասցե կամ գաղտնաբառ'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.show');
    }
}
