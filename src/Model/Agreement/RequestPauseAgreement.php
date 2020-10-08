<?php

namespace SincosSoftware\Vipps\Model\Agreement;

class RequestPauseAgreement
{
    protected $productName;

    public function __construct(ResponseGetAgreement $agreement)
    {
        $this->productName = '⏸' . $agreement->getProductName();
    }
}
