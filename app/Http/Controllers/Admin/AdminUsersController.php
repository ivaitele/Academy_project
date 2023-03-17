<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Managers\FileManager;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function index(): view
    {
        $users = User::all();
        $active = 'users';

        return view('admin.users.index', compact('users', 'active'));
    }

    public function create()
    {
        $active = 'users';
        return view('admin.users.create', compact( 'active'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->title = $request->title ?? $request->first_name.' '.$request->last_name;

        $user->email = $request->email;
        $user->role = $request->role;

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $active = 'users';
        return view('admin.users.edit', compact('user', 'active'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if (isset($request->password)){
            $user->password = Hash::make($request->password);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->title = $request->title ?? $request->first_name.' '.$request->last_name;

        if (Auth::user()->id !== $user->id) {
            $user->role = $request->role;
        }

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
