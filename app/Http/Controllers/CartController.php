<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Managers\CartManager;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrdersEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Ramsey\Uuid\Uuid;

class CartController extends Controller
{
    public function __construct(protected CartManager $cartManager)
    {
    }

    public function show(Request $request): view
    {
        $cart = $request->session()->get('cart');
        // Is sesijos gauname event_id ir quantity $cart = [5 => 2, 7 => 8]

        $ids = array_keys($cart ?? []);
        // grazina masyva su event_id $ids = [5, 7]

        $events = Event::query()->whereIn('id', $ids)->get();

        return view ('cart.show', ['cart' => $cart, 'events' => $events]);
    }

    public function onCheckout(PaymentRequest $request)
    {
        $cart = $request->session()->get('cart');

        if ($cart) {
            $ids = array_keys($cart ?? []);
            $events = Event::query()->whereIn('id', $ids)->get();

            $data = [
                'name' => $request->card_name,
                'nr' => $request->card_nr,
                'end_date' => $request->card_end_date,
                'svc' => $request->card_svc,
            ];

            //Perduodam mokejimo duomenys kad patvirtintu apmokejima
            $bankResponse = $this->cartManager->bankTransaction($data);

            if (!($bankResponse->success)) {
                return redirect()->route('cart.payment')
                    ->with('error', 'Korteles duomenys neteisingi ');
            }

            //Po mokejimo patvirtinimo sukuriamas naujas uzsakymas
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->transaction_id = $bankResponse->transaction_id;
            $order->payment_method = $bankResponse->payment_method;
            $order->status = $bankResponse->status;
            $order->save();

            foreach ($events as $event) {
                $orderEvent = new OrdersEvent();
                $orderEvent->order_id = $order->id;
                $orderEvent->event_id = $event->id;
                $orderEvent->event_name = $event->title;
                $orderEvent->qty = $cart[$event->id];
                $orderEvent->price = $event->price;
                $orderEvent->code = Uuid::uuid4();

                $orderEvent->save();

                $event->tickets_left = $event->tickets_left - $orderEvent->qty;
                $event->save();
            }

            $request->session()->forget('cart');
        }

        return redirect()->route('user.tickets');
    }

    public function ticket($request) {

        $ticket = OrdersEvent::query()->where('code', $request)->first();

        return view ('cart.ticket', ['ticket' => $ticket]);
    }

    public function payment(Request $request) {

        $cart = $request->session()->get('cart');
        $ids = array_keys($cart ?? []);

        $events = Event::query()->whereIn('id', $ids)->get();

        return view ('cart.payment', ['cart' => $cart, 'events' => $events]);
    }
}
