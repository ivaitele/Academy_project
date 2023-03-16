@extends('layout')

@section('content')


    <div class="container">
        <h1>Profilis</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Profile</h3>

                <form class="form" action="{{route('user.update')}}" method="post">
                    @method('PUT')
                    @csrf

                    @if (Auth::user()?->isOrganizer() || Auth::user()?->isAdmin())

                    <div class="form__input">
                        <label>Pavadinimas</label>
                        <input type="text" name="title" value="{{Auth::user()->title}}" />
                    </div>

                    @endif

                    <div class="form__input">
                        <label>Vardas</label>
                        <input type="text" name="first_name" value="{{Auth::user()->first_name}}" />
                    </div>
                    <div class="form__input">
                        <label>Pavardė</label>
                        <input type="text" name="last_name" value="{{Auth::user()->last_name}}" />
                    </div>
                    <div class="form__input">
                        <label>Slaptažodis</label>
                        <input type="password" name="password" />
                    </div>
                    <div class="form__input">
                        <label>Adresas</label>
                        <input type="text" name="address" value="{{Auth::user()->address}}"/>
                    </div>
                    <div class="form__action">
                        <button type="submit">Atnaujinti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
