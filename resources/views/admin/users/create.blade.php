@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>New user</h3>

                <form class="form" action="{{route('admin.users.store')}}" method="post" >
                    @csrf
                    <div class="form__input">
                        <label>Name</label>
                        <input type="text" name="name" value="{{old('name')}}" />
                    </div>
                    <div class="form__input">
                        <label>Email</label>
                        <input type="text" name="email" value="{{old('email')}}" />
                    </div>
                    <div class="form__input">
                        <label>Role</label>
                        <select name="role">
                            <option value="user">User</option>
                            <option value="organizer">Organizer</option>
                            <option value="admin">Admin</option>
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
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
