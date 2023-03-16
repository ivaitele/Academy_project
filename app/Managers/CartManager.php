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

        $response = new BankResponse();
        $response->success = false;
        $response->transaction_id = Uuid::uuid4();
        $response->status = 'Payment failed';


        //Tikrinam ar mokejimo duomenys yra teisingi
        if ($name == $this->name &&
            $nr == $this->nr &&
            $end_date == $this->end_date &&
            $svc == $this->svc) {

            $response->payment_method = 'VISA';
            $response->status = 'Payment completed';

            $response->success = true;
        }

        return $response;
    }
}
