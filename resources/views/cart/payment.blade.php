@extends('layout')

@section('content')

    @php($orderTotal = 0)

    <div class="container section">
        <div class="section__article">
            <h1>Tavo krepšelis</h1>

            <table>
                <thead>
                <tr>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>Kaina</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)

                    <tr>
                        <td>
                            <a href="{{route('events.show', $event->id)}}">{{$event->title}}</a>
                        </td>
                        <td>{{$cart[$event->id]}}</td>

                        <td>@php($total = $cart[$event->id] * $event->price)
                            @php($orderTotal += $total)
                            ${{$total}}
                        </td>

                        <td width="100">
                            <form action="{{route('events.buy', $event->id)}}?redirect=cart.show" method="post">
                                @csrf
                                <button type="submit" class="small secondary">Panaikinti</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

            <div class="cart-total">
                Viso: <span>${{$orderTotal}}</span>
            </div>

            @if ($cart)
                <h1>Mokejimo duomenys</h1>

                <form action="{{route('cart.checkout')}}" method="post">
                    @csrf

                    <div class="form__input">
                        <label>Vardas Pavarde:</label>
                        <input name="card_name" value="{{old('card_name')}}" />
                    </div>
                    <div class="form__input">
                        <label>Korteles numeris:</label>
                        <input name="card_nr" type="text" value="{{old('card_nr')}}"/>
                    </div>
                    <div class="form__input">
                        <label>Kortele galioja iki:</label>
                        <input name="card_end_date" type="month" value="{{old('card_end_date')}}"/>
                    </div>
                    <div class="form__input">
                        <label>Korteles SVC numeris:</label>
                        <input name="card_svc" type="text" value="{{old('card_svc')}}"/>
                    </div>
                    @if(Session::has('error'))
                        <div class="alert alert-error">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <div class="form__action">
                        <button type="submit">Moketi</button>
                        <a class="btn secondary" href="{{route('cart.show')}}">Atgal</a>

                    </div>
                </form>

                <div class="cart-total">

                    @guest
                        <a class="btn" href="{{route('auth.login')}}?redirect=cart.show">Login to continue</a>
                    @endguest
                </div>

            @endif
        </div>
    </div>
@endsection
