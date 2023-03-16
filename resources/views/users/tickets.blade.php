@extends('layout')

@section('content')

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <div class="container">
        <h1>Bilietai</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article blank">
                @foreach($orders as $order)
                    <div class="box">
                        <div>Užsakymas: <b>{{$order->id}}</b></div>
                        <div>Sukurtas: <b>{{$order->created_at}}</b></div>
                        <div>Mokejimo metodas: <b>{{$order->payment_method}}</b></div>
                        <div>Suma: <b>{{$order->grand_total}}</b></div>
                        <div><b>{{$order->status}}</b></div>
                        @foreach($order->items as $item)

                            <x-ticket :ticket="$item" />

                        @endforeach

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
