<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function login(Request $request): View
    {
        return view('auth.login', ['redirect' => $request->redirect]);
    }

    public function onLogin(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $redirect = $request->redirect ?? 'events.list';
        return redirect()->route($redirect);
    }

    public function onLogout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('events.list');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function onRegister(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'user';

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('auth.login');
    }
}
