@extends('layout')

@section('content')

    <div class="container">
        <div class="center">
            <h1>Prisijungimas</h1>

            <form class="form" action="{{route('auth.onLogin')}}{{$redirect ? '?redirect='.$redirect : ''}}" method="post">
                @csrf

                <div class="form__input">
                    <label>El.paštas:</label>
                    <input name="email" />
                </div>
                <div class="form__input">
                    <label>Slaptažodis:</label>
                    <input name="password" type="password" />
                </div>
                <div class="form__action">
                    <button type="submit">Prisjungti</button>
                </div>

            </form>
            <div class="center">
                <h4>Neturite paskyros?</h4>
                <a href="{{route('auth.register')}}">Register</a>
            </div>
        </div>
    </div>
@endsection
