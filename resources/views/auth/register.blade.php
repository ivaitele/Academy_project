@extends('layout')

@section('content')

    <div class="container">
        <div class="center">
            <h1>Registracija</h1>

            <form class="form" action="{{route('auth.onRegister')}}" method="post">
                @csrf

                <div class="form__input">
                    <label>Vardas:</label>
                    <input name="first_name" value="{{old('first_name')}}" />
                </div>
                <div class="form__input">
                    <label>Pavardė:</label>
                    <input name="last_name" value="{{old('last_name')}}" />
                </div>
                <div class="form__input">
                    <label>El.paštas:</label>
                    <input name="email" value="{{old('email')}}" />
                </div>
                <div class="form__input">
                    <label>Slaptažodis</label>
                    <input type="password" name="password" />
                </div>

                <div class="form__input">
                    <label>Slaptažodio patvirtinimas</label>
                    <input type="password" name="password_confirmation" />
                </div>
                <div class="form__action">
                    <button type="submit">Registruotis</button>
                </div>

            </form>
            <div class="center">
                <h4>Turite paskyra?</h4>
                <a href="{{route('auth.login')}}">Prisijungti</a>
            </div>
        </div>
    </div>
@endsection
