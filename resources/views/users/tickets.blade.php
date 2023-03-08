@extends('layout')

@section('content')

    <div class="container">
        <h1>Tickets</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article blank">
                @foreach($orders as $order)
                    <div class="box">
                        <h4>Order: {{$order->id}}</h4>
                        <div>Created: {{$order->created_at}}</div>
                        @foreach($order->items as $item)
                            <div class="ticket">
                                <div class="ticket__left">
                                    <h4>{{$item->event_name}}</h4>

                                    <div class="location with-icon">
                                        <x-icons.location />
                                        {{$item->event->venue}}</div>
                                    <div class="time with-icon">
                                        <x-icons.time />
                                        {{$item->event->start_date}}
                                    </div>

                                    <div>
                                        <div class="price__label">Ticket price</div>
                                        <div class="price with-icon">
                                            <x-icons.price />
                                            {{$item->price}}
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket__center">
                                    <img src="{{$item->event->image}}" alt="" />
                                </div>

                                <div class="ticket__right">
                                    <div>Guest</div>
                                    <div class="name">{{$item->order->user->name}}</div>

                                    <div>{{$item->qty}} person{{$item->qty > 1 ? 's' : ''}}</div>
                                    <div class="barcode"><img src="/assets/barcode.png" alt="" /></div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
