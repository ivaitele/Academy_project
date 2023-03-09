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
            <div class="price__label">Ticket price</div>
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
        <div>Guest</div>
        <div class="name">{{$ticket->order->user->name}}</div>

        <div>{{$ticket->qty}} person{{$ticket->qty > 1 ? 's' : ''}}</div>


        <div class="qr" id="{{$ticket->code}}"></div>
        <script type="text/javascript">
            new QRCode(document.getElementById("{{$ticket->code}}"), "http://localhost/ticket/{{$ticket->code}}");
        </script>
    </div>
</div>
