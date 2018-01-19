<?php

namespace uCoz\model;

class User
{
    public $fio;
    public $country;
    protected $balance;
    protected $isPro;
    /**
     * User constructor.
     *
     * @param $fio
     * @param $country
     */
    public function __construct($fio, $country)
    {
        $this->fio = $fio;
        $this->country = $country;
        $this->balance = 1000;
        $this->isPro = false;
    }
    /**
     * Покупка пользователем PRO.
     */
    public function buyPro()
    {
        $proPayment = new Payment(Payment::PRO_PRICE, $this);
        $this->balance = $proPayment->getPaySumm();
        $this->isPro = true;
    }

}
