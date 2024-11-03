<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login(): View
    {
        return view('auth');
    }

    public function authenticate(Request $request)
    {
        $creds = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        if (Auth::attempt([$loginType => $creds['username'], 'password' => $creds['password']])) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        if (Auth::guard('admin')->attempt(['email' => $creds['username'], 'password' => $creds['password']])) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return $this->redirectBack([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], true);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->redirect('/', [
            'status' => 'success',
            'message' => 'Logout success'
        ]);
    }
}
