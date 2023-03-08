@props(['event_id' => 2])

@php
$tickets = \App\Models\OrdersEvent::query()->where('event_id', $event_id)->get();
@endphp

<table>
    <thead>
    <tr>
        <th>User</th>
        <th>Time</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)

        <tr>
            <td>{{$ticket->order->user->name}}</td>
            <td>{{$ticket->order->created_at}}</td>
            <td>{{$ticket->qty}}</td>
            <td>{{$ticket->price}}</td>
        </tr>

    @endforeach
    </tbody>
</table>
