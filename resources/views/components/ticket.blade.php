@props(['ticket'])

<div class="ticket">
    <div class="ticket__left">
        <h4>{{$ticket->event_name}}</h4>

        <div class="location with-icon">
            <x-icons.location />
            {{$ticket->event->venue}}</div>
        <div class="time with-icon">
            <x-icons.time />
            {{$ticket->event->start_date}}
        </div>

        <div>
            <div class="price__label">Bilieto kaina</div>
            <div class="price with-icon">
                <x-icons.price />
                {{$ticket->price}}
            </div>
        </div>
    </div>
    <div class="ticket__center">
        <img src="{{$ticket->event->image}}" alt="" />
    </div>

    <div class="ticket__right">
        <div>{{$ticket->qty}} {{$ticket->qty > 1 ? 'asmenys' : 'asmuo'}}</div>
        <div class="name">{{$ticket->order->user->title}}</div>

        @if ($ticket->code)
        <a href="{{route('cart.ticket', $ticket->code)}}" class="qr" id="{{$ticket->code}}"></a>

        <script type="text/javascript">
            new QRCode(document.getElementById("{{$ticket->code}}"), "http://localhost/ticket/{{$ticket->code}}");
        </script>

        @endif
    </div>
</div>
