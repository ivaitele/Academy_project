<?php

namespace App\Managers;

use App\Models\Event;
use Ramsey\Uuid\Uuid;

class BankResponse {};

class CartManager
{
    public function getCart($request)
    {
        // Is sesijos gauname event_id ir quantity $cart = [5 => 2, 7 => 8]
        return $request->session()->get('cart');
    }

    public function getEvents($cart)
    {
        // grazina masyva su event_id $ids = [5, 7]
        $ids = array_keys($cart ?? []);

        return Event::query()->whereIn('id', $ids)->get();
    }

    //Imituojam banka
    private $nr = 1234123412341234;
    private $name = 'Vardas Pavarde';
    private $end_date = '2023-11';
    private $svc = 123;
    private $money = 450;

    public function bankTransaction($data)
    {
        $name = $data['name'];
        $nr = $data['nr'];
        $end_date = $data['end_date'];
        $svc = $data['svc'];
        $events = $data['events'];
        $cart = $data['cart'];
        $total = 0;

        foreach ($events as $event)
        {
            $qty = $cart[$event->id];
            $total = $total + ($event->price * $qty);
        }

        $response = new BankResponse();
        $response->success = false;
        $response->status = 'Payment failed';

        $response->total = $total;
        $response->transaction_id = Uuid::uuid4();

        //Tikrinam ar mokejimo duomenys yra teisingi
        if ($name == $this->name &&
            $nr == $this->nr &&
            $end_date == $this->end_date &&
            $svc == $this->svc &&
            $total <= $this->money) {

            $response->payment_method = 'VISA';

            $response->success = true;
            $response->status = 'Payment completed';
        }

        return $response;
    }
}
