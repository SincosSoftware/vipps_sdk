<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase;

abstract class AgreementResourceBase extends PaymentResourceBase
{

    /**
     * {@inheritdoc}
     */
    public function __construct(\SincosSoftware\Vipps\VippsInterface $vipps, $subscription_key)
    {
        parent::__construct($vipps, $subscription_key);

        $this->headers['Idempotency-Key'] = hash('md5', time());
    }
}