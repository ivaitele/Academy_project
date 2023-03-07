<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyRequest;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrdersEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function show(Request $request) {
        $cart = $request->session()->get('cart');
        // $card = [id: 5 => qty: '1', id: 7 => qty: '3']

        $ids = array_keys($cart ?? []);
        // $ids = [5, 7]

        $events = Event::query()->whereIn('id', $ids)->get();

        return view ('cart.show', ['cart' => $cart, 'events' => $events]);
    }

    public function onCheckout(Request $request) {
        $cart = $request->session()->get('cart');

        if ($cart) {
            $ids = array_keys($cart ?? []);
            $events = Event::query()->whereIn('id', $ids)->get();

            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->save();

            foreach ($events as $event) {
                $orderEvent = new OrdersEvent();
                $orderEvent->order_id = $order->id;
                $orderEvent->event_id = $event->id;
                $orderEvent->event_name = $event->title;
                $orderEvent->qty = intval($cart[$event->id]);
                $orderEvent->price = $event->price;

                $orderEvent->save();
            }

            $request->session()->forget('cart');
        }

        return redirect()->route('user.tickets');
    }
}
