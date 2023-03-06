<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function list(): View
    {
        $events = Event::query()->with(['category'])->get();

        return view('events.list', ['events' => $events]);
    }

    public function show(Request $request, Event $event): View
    {
        $cart = $request->session()->get('cart');
        $event->count = $cart[$event->id] ?? 0;
        return view('events.show', ['event' => $event, 'cart' => $cart]);
    }

    public function onBuy(BuyRequest $request, Event $event) {
        $cart = $request->session()->get('cart');
        if (!isset($cart)) {
            $cart = array();
        }

        $cart[$event->id] = $request->count;
        if ($cart[$event->id] == 0) {
            unset($cart[$event->id]);
        }

        $request->session()->put('cart', $cart);

        if (count($cart) === 0) {
            $request->session()->forget('cart');
        }

        $request->session()->save();

        return redirect()->route('events.show', $event->id);
    }

    public function cart(Request $request) {
        $cart = $request->session()->get('cart');

        $ids = array_keys($cart ?? []);

        $events = Event::query()->whereIn('id', $ids)->get();

        return view ('events.cart', ['cart' => $cart, 'events' => $events]);
    }
}
