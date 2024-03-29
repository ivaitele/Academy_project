@extends('layout')

@section('content')

    <div class="container">
        <h1>{{$event->title}}</h1>

        <section class="section">
            @include('users.menu')

            <article class="section__article blank">
                <div class="box">
                    <header class="section__header">
                        <img src="{{$event->image}}" alt="{{$event->title}}" />

                        <div class="section__info">
                            <h2>{{$event->title}}</h2>

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
                            </div>

                        </div>
                    </header>

                    <div class="section__desc">
                        <p>{{$event->detail}}</p>
                    </div>
                </div>

                <div class="section__aside__box">
                    <h3>BILIETAI</h3>
                    <x-tickets :event_id="$event->id" />
                </div>

                <aside class="box">
                    <div class="section__aside__box">
                        <h3>Svarbi informacija</h3>

                        <ul>
                            <li><b>Renginio trukmė:</b> {{$event->duration}}</li>
                            <li><b>Renginio tipas:</b> {{$event->category->title}}</li>
                            <li><b>Organizatorius:</b>  {{$event->user->title}}, {{$event->user->address}}</li>
                            <li><b>Status:</b> {{$event->status}}</li>
                            <li><b>Vietos visos:</b> {{$event->tickets_available}}</li>
                            <li><b>Vietos likusios:</b> {{$event->tickets_left}}</li>
                        </ul>
                    </div>

                    <div class="section__aside__box">
                        <h3>Papildoma informacija</h3>
                        <p>{{$event->additional_info}}</p>
                    </div>
                </aside>
            </article>


        </section>
    </div>

@endsection
