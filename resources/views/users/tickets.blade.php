@extends('layout')

@section('content')

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <div class="container">
        <h1>Tickets</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article blank">
                <div id="hello">HELLO</div>
                @foreach($orders as $order)
                    <div class="box">
                        <h4>Order: {{$order->id}}</h4>
                        <div>Created: {{$order->created_at}}</div>
                        @foreach($order->items as $item)

                            <x-ticket :ticket="$item" />

                        @endforeach

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
