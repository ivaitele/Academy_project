@props(['event_id'])

@php
$tickets = \App\Models\OrdersEvent::query()->where('event_id', $event_id)->get();
@endphp

<table>
    <thead>
    <tr>
        <th>Vartotojas</th>
        <th>Data/laikas</th>
        <th>Kiekis</th>
        <th>Kaina</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->order->user->title}}</td>
            <td>{{$ticket->order->created_at}}</td>
            <td>{{$ticket->qty}}</td>
            <td>{{$ticket->price}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
