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
                        <div class="order__header">
                            <div>
                                <div>Užsakymas: <b>{{$order->id}}</b></div>
                                <div>Sukurtas: <b>{{$order->created_at}}</b></div>
                                <div>Mokejimo metodas: <b>{{$order->payment_method}}</b></div>
                            </div>

                            <div>
                                <div class="order__status">{{$order->status}}</div>
                                <div class="order__grand-total">Suma: <b>$ {{$order->grand_total}}</b></div>
                            </div>
                        </div>


                        @foreach($order->items as $ticket)

                            <x-ticket :ticket="$ticket" />

                        @endforeach

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
