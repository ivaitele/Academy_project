@extends('layout')

@section('content')

    @php($orderTotal = 0)

    <div class="container section">
        <div class="section__article">
            <h1>Your cart</h1>

            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                            <form action="{{route('events.buy', $event->id)}}" method="post">
                                @csrf
                                <button type="submit" class="small secondary">Remove</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

            <div class="cart-total">
                Total: <span>${{$orderTotal}}</span>
            </div>

            @if ($cart)

            <div class="cart-total">
                @auth
                    <form action="{{route('cart.checkout')}}" method="post">
                        @csrf
                        <button type="submit">Checkout</button>
                    </form>
                @endauth

                @guest
                    <a class="btn" href="{{route('auth.login')}}?redirect=cart.show">Login to continue</a>
                @endguest
            </div>

            @endif
        </div>
    </div>
@endsection
