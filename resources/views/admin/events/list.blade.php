@extends('layout')

@section('content')


    <div class="container">
        <h1>Events</h1>
        <div class="section">
            @include('users.menu')


            <div class="section__article">
                <div class="section__sub-head">
                    <h3>Events</h3>
                    <a class="btn success small" href="{{route(Auth::user()->role.'.event.create')}}">New Event</a>
                </div>

                <ul>
                    @foreach($events as $event)

                        <li class="event admin">
                            <div class="event__image">
                                <img src="{{$event->image}}" alt="{{$event->title}}" />
                            </div>

                            <div class="event__content">
                                <h4>{{$event->title}}</h4>
                                <div>Category: {{$event->category->title}}</div>
                                <div class="progress" style="--done: {{$event->tickets_sold_percents()}}%">
                                    <div class="progress__line"></div>
                                    <div class="progress__label">{{$event->tickets_sold()}} / {{$event->tickets_available}} sold</div>
                                </div>

                                <div class="time with-icon">
                                    <x-icons.time />
                                    {{$event->start_date}}
                                </div>
                                <div class="location with-icon">
                                    <x-icons.location />
                                    {{$event->venue}}
                                </div>
                                <div class="price with-icon">
                                    <x-icons.price />
                                    {{$event->price}}

                                    <a class="btn small" href="{{route(Auth::user()->role.'.event.show', $event)}}">Tickets</a>

                                    <a class="btn small" href="{{route(Auth::user()->role.'.event.edit', $event)}}">Edit</a>
                                    <button class="secondary small">Delete</button>

                                </div>


                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
