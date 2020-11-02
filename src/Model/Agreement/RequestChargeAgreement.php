<?php

namespace SincosSoftware\Vipps\Model\Agreement;

class RequestChargeAgreement
{
    protected $amount = 0;
    protected $currency = 'NOK';
    protected $description;
    protected $due;
    protected $retryDays = 7;

    public function __construct($amount, $description)
    {
        $this->amount = $amount * 100;
        $this->description = $description;
        $this->due = \Carbon\Carbon::now()->addDays(2)->toDateString();
    }
}
