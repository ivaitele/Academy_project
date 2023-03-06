@extends('layout')

@section('content')

    <div class="container">
        <div class="center">
            <h1>Login</h1>

            <form class="form" action="{{route('auth.onLogin')}}" method="post">
                @csrf

                <div class="form__input">
                    <label>Email:</label>
                    <input name="email" />
                </div>
                <div class="form__input">
                    <label>Password:</label>
                    <input name="password" type="password" />
                </div>
                <div class="form__action">
                    <button type="submit">Login</button>
                </div>

            </form>
            <div class="center">
                <h4>Do not have account?</h4>
                <a href="{{route('auth.register')}}">Register</a>
            </div>
        </div>
    </div>
@endsection
