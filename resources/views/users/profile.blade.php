@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Profile</h3>

                <form class="form" action="{{route('user.update')}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form__input">
                        <label>First name</label>
                        <input name="name" value="{{Auth::user()->name}}" />
                    </div>
                    <div class="form__input">
                        <label>Last name</label>
                        <input />
                    </div>
                    <div class="form__input">
                        <label>Email</label>
                        <input />
                    </div>
                    <div class="form__input">
                        <label>Password</label>
                        <input />
                    </div>
                    <div class="form__action">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
