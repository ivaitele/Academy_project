<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Managers\FileManager;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function list(): View
    {
        $users = User::all();
        $active = 'users';

        return view('admin.users.list', compact('users', 'active'));
    }

//    public function show(Event $event): View
//    {
//        return view('events.show', ['event' => $event]);
//    }

    public function create(): View
    {
        $active = 'users';
        return view('admin.users.create', compact( 'active'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('admin.users.list');
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

        $user->name = $request->name;

        if (Auth::user()->id !== $user->id) {
            $user->role = $request->role;
        }

        $user->save();

        return redirect()->route('admin.users.list');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.list');
    }
}
