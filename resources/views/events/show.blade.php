@extends('layout')

@section('content')

    <div class="container">
        <h1>Event info</h1>

        <section class="section">
            <article class="section__article">
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
                        <div>
                            <div class="buy">
                                @if ($event->tickets_left > 0)

                                <form action="{{route('events.buy', $event->id)}}" method="post">
                                    @csrf
                                    <button type="submit">
                                        {{$event->count ? 'Update' : 'Pirkti bilieta' }}
                                    </button>
                                    <select class="buy__count" name="count">
                                        @foreach(['0', '1','2','3','4','5','6','7','8','9', '10'] as $qty)

                                            <option
                                                value="{{$qty}}"
                                                {{$event->count === $qty ? 'selected="selected"' : ''}}
                                            >
                                                {{$qty}}
                                            </option>

                                        @endforeach

                                    </select>
                                </form>
                                @else
                                    <button disabled >Bilietai parduoti</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </header>

                <div class="section__desc">
                    <p>{{$event->detail}}</p>
                </div>
            </article>

            <aside class="section__aside">
                <div class="section__aside__box">
                    <h3>Svarbi informacija</h3>

                    <ul>
                        <li><b>Renginio trukmė:</b>{{$event->duration}}</li>
                        <li><b>Renginio tipas:</b>{{$event->category->title}}</li>
                        <li><b>Organizatorius</b> {{$event->organizer}}</li>
                        <li><b>Status:</b>{{$event->status}}</li>
                        <li><b>Vietos:</b>{{$event->tickets_left}}</li>
                    </ul>
                </div>

                <div class="section__aside__box">
                    <h3>Papildoma informacija</h3>
                    <p>{{$event->additional_info}}</p>
                </div>
            </aside>
        </section>
    </div>

@endsection
