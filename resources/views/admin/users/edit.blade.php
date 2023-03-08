@extends('layout')

@section('content')


    <div class="container">
        <h1>Users</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Edit user</h3>

                <form class="form" action="{{route('admin.users.update', $user->id)}}" method="post" >
                    @method('put')
                    @csrf
                    <h4>{{$user->email}}</h4>
                    <div class="form__input">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$user->name}}" />
                    </div>
                    <div class="form__input">
                        <label>Role</label>
                        <select name="role" >
                            <option value="user" selected="{{$user->role === 'user'}}">User</option>
                            <option value="organizer" selected="{{$user->role === 'organizer'}}">Organizer</option>
                            <option value="admin" selected="{{$user->role === 'admin'}}">Admin</option>
                        </select>
                    </div>

                    <div class="form__input">
                        <label>Password</label>
                        <input type="password" name="password" />
                    </div>

                    <div class="form__input">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" />
                    </div>

                    <div class="form__action">
                        <button type="submit">Update</button>
                        <a class="btn secondary" href="{{route('admin.users.list')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
