<?php

namespace SincosSoftware\Vipps\Model\Agreement;

class RequestRefundCharge
{
    protected $amount;
    protected $description = 'Kreditering';

    public function __construct($amount)
    {
        $this->amount = $amount;
    }
}
