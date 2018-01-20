<?php

namespace app\components\airport;

class Payment
{
    const PRO_PRICE = 200;
    protected $summ;
    /**
     * Payment constructor.
     *
     * @param $summ
     * @param User $user
     */
    public function __construct($summ, User $user)
    {
        $this->summ = $summ;
        $this->user = $user;
    }
    /**
     * Получение суммы оплаты.
     *
     * @return float
     */
    public function getPaySumm()
    {
        $tax = (new Tax())->getTaxByUserAndSumm($this->user, $this->summ);
        return $this->summ - $tax;
    }

}
