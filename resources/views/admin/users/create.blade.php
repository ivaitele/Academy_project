@extends('layout')

@section('content')


    <div class="container">
        <h1>Users</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>New user</h3>

                <form class="form" action="{{route('users.store')}}" method="post" >
                    @csrf
                    <div class="form__input">
                        <label>Email</label>

                        <input type="text" name="email" value="{{old('email')}}" />
                    </div>
                    <div class="form__input">
                        <label>First name</label>
                        <input type="text" name="first_name" value="{{old('first_name')}}" />
                    </div>
                    <div class="form__input">
                        <label>Last name</label>
                        <input type="text" name="last_name" value="{{old('last_name')}}" />
                    </div>
                    <div class="form__input">
                        <label>Title <small>optional</small></label>

                        <input type="text" name="title" value="{{old('title')}}" />
                    </div>
                    <div class="form__input">
                        <label>Role</label>
                        <select name="role" >
                            <option value="user" {{old('role') === 'user' ? 'selected' : ''}}>User</option>
                            <option value="organizer" {{old('role') === 'organizer' ? 'selected' : ''}}>Organizer</option>
                            <option value="admin" {{old('role') === 'admin' ? 'selected' : ''}}>Admin</option>
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
