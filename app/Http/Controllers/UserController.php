<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    public function profile(): View
    {
        return view('users.profile', ['active' => 'profile']);
    }

    public function dashboard(): View
    {
        return view('users.dashboard', ['active' => 'dashboard']);
    }

    public function tickets(): View
    {
        $orders = Order::query()
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.tickets', ['active' => 'tickets', 'orders' => $orders]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->title = $request->title ?? $request->first_name .' '. $request->last_name;
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.profile');
    }
}
