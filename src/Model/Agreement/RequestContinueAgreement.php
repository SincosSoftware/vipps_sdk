<?php

namespace SincosSoftware\Vipps\Model\Agreement;

class RequestContinueAgreement
{
    protected $productName;

    public function __construct(ResponseGetAgreement $agreement)
    {
        // PHP does no like emojis. Remove all none printable characters
        $this->productName =  trim(preg_replace('/[[:^print:]]/', '', $agreement->getProductName()));
    }
}
