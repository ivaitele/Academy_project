<?php

namespace App\Managers;

use Ramsey\Uuid\Uuid;

class BankResponse {};

class CartManager
{
    //Imituojam banka
    private $nr = 1234123412341234;
    private $name = 'ok ok';
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
        $secure_code = $data['token'];
        $total = 0;

        foreach ($events as $event)
        {
            $qty = $cart[$event->id];
            $total = $total + ($event->price * $qty);
        }

        $response = new BankResponse();
        $response->success = false;
        $response->total = $total;
        $response->transaction_id = Uuid::uuid4();
        $response->status = 'Payment failed';
        $response->secure_code = $secure_code;

        //Tikrinam ar mokejimo duomenys yra teisingi
        if ($name == $this->name &&
            $nr == $this->nr &&
            $end_date == $this->end_date &&
            $svc == $this->svc &&
            $total <= $this->money) {

            $response->payment_method = 'VISA';
            $response->status = 'Payment completed';

            $response->success = true;
        }

        return $response;
    }
}
