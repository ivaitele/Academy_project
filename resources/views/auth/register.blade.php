@extends('layout')

@section('content')

    <div class="container">
        <div class="center">
            <h1>Register</h1>

            <form class="form" action="{{route('auth.onRegister')}}" method="post">
                @csrf

                <div class="form__input">
                    <label>Name:</label>
                    <input name="name" value="{{old('name')}}" />
                </div>
                <div class="form__input">
                    <label>Email:</label>
                    <input name="email" value="{{old('email')}}" />
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
                    <button type="submit">Login</button>
                </div>

            </form>
            <div class="center">
                <h4>Have account?</h4>
                <a href="{{route('auth.login')}}">Login</a>
            </div>
        </div>
    </div>
@endsection
