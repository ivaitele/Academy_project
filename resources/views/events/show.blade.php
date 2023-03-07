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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4.375 4C3.68464 4 3.125 4.55964 3.125 5.25V17.5C3.125 18.1904 3.68464 18.75 4.375 18.75H16.625C17.3154 18.75 17.875 18.1904 17.875 17.5V5.25C17.875 4.55964 17.3154 4 16.625 4H4.375ZM2.125 5.25C2.125 4.00736 3.13236 3 4.375 3H16.625C17.8676 3 18.875 4.00736 18.875 5.25V17.5C18.875 18.7426 17.8676 19.75 16.625 19.75H4.375C3.13236 19.75 2.125 18.7426 2.125 17.5V5.25Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M2.125 8.75C2.125 8.47386 2.34886 8.25 2.625 8.25H18.375C18.6511 8.25 18.875 8.47386 18.875 8.75C18.875 9.02614 18.6511 9.25 18.375 9.25H2.625C2.34886 9.25 2.125 9.02614 2.125 8.75Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M3.875 12.65C3.875 12.3739 4.09886 12.15 4.375 12.15H7C7.27614 12.15 7.5 12.3739 7.5 12.65C7.5 12.9262 7.27614 13.15 7 13.15H4.375C4.09886 13.15 3.875 12.9262 3.875 12.65Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M3.875 15.4C3.875 15.1239 4.09886 14.9 4.375 14.9H7C7.27614 14.9 7.5 15.1239 7.5 15.4C7.5 15.6762 7.27614 15.9 7 15.9H4.375C4.09886 15.9 3.875 15.6762 3.875 15.4Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8.5 12.65C8.5 12.3739 8.72386 12.15 9 12.15H11.625C11.9011 12.15 12.125 12.3739 12.125 12.65C12.125 12.9262 11.9011 13.15 11.625 13.15H9C8.72386 13.15 8.5 12.9262 8.5 12.65Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8.5 15.4C8.5 15.1239 8.72386 14.9 9 14.9H11.625C11.9011 14.9 12.125 15.1239 12.125 15.4C12.125 15.6762 11.9011 15.9 11.625 15.9H9C8.72386 15.9 8.5 15.6762 8.5 15.4Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M13.5 12.65C13.5 12.3739 13.7239 12.15 14 12.15H16.625C16.9011 12.15 17.125 12.3739 17.125 12.65C17.125 12.9262 16.9011 13.15 16.625 13.15H14C13.7239 13.15 13.5 12.9262 13.5 12.65Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M13.5 15.4C13.5 15.1239 13.7239 14.9 14 14.9H16.625C16.9011 14.9 17.125 15.1239 17.125 15.4C17.125 15.6762 16.9011 15.9 16.625 15.9H14C13.7239 15.9 13.5 15.6762 13.5 15.4Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M14 1.25C14.2761 1.25 14.5 1.47386 14.5 1.75V5.25C14.5 5.52614 14.2761 5.75 14 5.75C13.7239 5.75 13.5 5.52614 13.5 5.25V1.75C13.5 1.47386 13.7239 1.25 14 1.25Z"
                                    fill="#333333"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M7 1.25C7.27614 1.25 7.5 1.47386 7.5 1.75V5.25C7.5 5.52614 7.27614 5.75 7 5.75C6.72386 5.75 6.5 5.52614 6.5 5.25V1.75C6.5 1.47386 6.72386 1.25 7 1.25Z"
                                    fill="#333333"
                                />
                            </svg>
                            {{$event->start_date}}
                        </div>
                        <div class="location with-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 25" fill="none">
                                <path
                                    d="M20 10.6818C20 17.0455 12 22.5 12 22.5C12 22.5 4 17.0455 4 10.6818C4 8.51187 4.84285 6.43079 6.34315 4.8964C7.84344 3.36201 9.87827 2.5 12 2.5C14.1217 2.5 16.1566 3.36201 17.6569 4.8964C19.1571 6.43079 20 8.51187 20 10.6818Z"
                                    stroke="#333333"
                                    stroke-width="1.3"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z"
                                    stroke="#333333"
                                    stroke-width="1.3"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            {{$event->venue}}
                        </div>
                        <div class="price with-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 21">
                                <path
                                    d="M17.0874 5.10947C17.2433 5.33735 17.5545 5.39566 17.7824 5.2397C18.0103 5.08373 18.0686 4.77257 17.9126 4.54468L17.0874 5.10947ZM7.30583 4.35424L7.65473 4.71238L7.30583 4.35424ZM7.79135 17.1228L8.14024 16.7646H8.14024L7.79135 17.1228ZM17.8962 16.4821C18.0646 16.2632 18.0238 15.9493 17.805 15.7808C17.5862 15.6124 17.2723 15.6532 17.1038 15.872L17.8962 16.4821ZM17.9126 4.54468C15.8015 1.46001 10.8034 0.248942 6.95693 3.99609L7.65473 4.71238C11.0411 1.41339 15.3146 2.51922 17.0874 5.10947L17.9126 4.54468ZM6.95693 3.99609C5.38664 5.52586 4.5 7.9108 4.5 10.3839C4.5 12.8661 5.39233 15.4839 7.44246 17.4809L8.14024 16.7646C6.30675 14.9786 5.5 12.6308 5.5 10.3839C5.5 8.12784 6.31241 6.02006 7.65473 4.71238L6.95693 3.99609ZM7.44246 17.4809C9.70517 19.6851 14.7648 20.5494 17.8962 16.4821L17.1038 15.872C14.4099 19.3711 10.0643 18.6389 8.14024 16.7646L7.44246 17.4809Z"
                                    fill="#616569"
                                />
                                <path d="M12.5 8H2.5" stroke="#616569" stroke-linecap="round" />
                                <path d="M12.5 13H2.5" stroke="#616569" stroke-linecap="round" />
                            </svg>
                            {{$event->price}}
                        </div>
                        <div>
                            <div class="buy">
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
                        <li><b>Vietos:</b>{{$event->seat}}</li>
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
