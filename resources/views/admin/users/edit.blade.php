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
                        <label>First name</label>
                        <input type="text" name="first_name" value="{{$user->first_name}}" />
                    </div>
                    <div class="form__input">
                        <label>Last name</label>
                        <input type="text" name="last_name" value="{{$user->last_name}}" />
                    </div>
                    <div class="form__input">
                        <label>Title <small>optional</small></label>

                        <input type="text" name="title" value="{{$user->title}}" />
                    </div>
                    <div class="form__input">
                        <label>Role</label>
                        <select name="role" >
                            <option value="user" {{$user->role === 'user' ? 'selected' : ''}}>User</option>
                            <option value="organizer" {{$user->role === 'organizer' ? 'selected' : ''}}>Organizer</option>
                            <option value="admin" {{$user->role === 'admin' ? 'selected' : ''}}>Admin</option>
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
                        <a class="btn secondary" href="{{route('admin.users.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
