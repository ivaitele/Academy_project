@extends('layout')

@section('content')

    <div class="container">
        <h1>{{$header}}</h1>

        <ul>

            @foreach($events as $event)

            <li class="event {{$event->isAvailable() ? 'available' : '__not-available'}}">
                <div class="event__image">
                    <img src="{{$event->image}}" alt="{{$event->title}}" />
                </div>

                <div class="event__content">
                    <h4>{{$event->title}}</h4>
                    <div>Category: {{$event->category->title}}</div>

                    <div class="time with-icon">
                        <x-icons.time />
                        {{$event->start_date}}</div>
                    <div class="location with-icon">
                        <x-icons.location />
                        {{$event->venue}}
                    </div>
                    <div class="price with-icon">
                        <x-icons.price />
                        {{$event->price}}
                    </div>

                    <div class="event__action">
                        <a class="btn" href="{{route('events.show', $event->id)}}">Detaliau</a>
                        @if (!$event->isAvailable())
                            <span class="warning">Bilietų nėra</span>
                        @endif
                    </div>
                </div>
            </li>

            @endforeach

        </ul>
    </div>
@endsection
