@extends('layout')

@section('content')


    <div class="container">
        <h1>Renginiai</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Redaguoti renginį</h3>

                <form class="form" action="{{route(Auth::user()->role.'.event.update', $event)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form__input">
                        <label>Pavadinimas</label>
                        <input type="text" name="title" value="{{$event->title}}" />
                    </div>
                    <div class="form__input">
                        <label>Aprašymas</label>
                        <textarea rows="10" name="detail">{{$event->detail}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Vieta</label>
                        <input type="text" name="venue" value="{{$event->venue}}" />
                    </div>
                    <div class="form__input">
                        <label>Foto</label>
                        <input type="file" name="image" />
                    </div>
                    <div class="form__input">
                        <label>Kaina</label>
                        <input type="text" name="price" value="{{$event->price}}" />
                    </div>
                    <div class="form__input">
                        <label>Trukmė</label>
                        <input type="text" name="duration" value="{{$event->duration}}" />
                    </div>

                    <div class="form__input">
                        <label>Kategorija</label>
                        <x-categories-select :selected="$event->category_id" />
                    </div>

                    <div class="form__input">
                        <label>Statusas</label>
                        <input type="text" name="status" value="{{$event->status}}" />
                    </div>
                    <div class="form__input">
                        <label>Start date</label>
                        <input type="datetime-local" name="start_date" value="{{$event->start_date}}" />
                    </div>
                    <div class="form__input">
                        <label>End date</label>
                        <input type="datetime-local" name="end_date" value="{{$event->end_date}}" />
                    </div>
                    <div class="form__input">
                        <label>Adresas</label>
                        <input type="text" name="location" value="{{$event->location}}" />
                    </div>

                    @if (Auth::user()?->isAdmin())
                    <div class="form__input">
                        <label>Organizatorius</label>
                        <x-organizer-select :selected="$event->user_id" />
                    </div>
                    @endif

                    <div class="form__input">
                        <label>Papildoma informacija</label>
                        <textarea rows="7" name="additional_info">{{$event->additional_info}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Visos vietos</label>
                        <input type="text" name="tickets_available" value="{{$event->tickets_available}}" />
                    </div>
                    <div class="form__input">
                        <label>Likusios vietos</label>
                        <input type="text" name="tickets_left" value="{{$event->tickets_left}}" />
                    </div>
                    <div class="form__action">
                        <button type="submit">Atnaujinti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
