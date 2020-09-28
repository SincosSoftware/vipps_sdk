<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;
use SincosSoftware\Vipps\Model\Payment\CustomerInfo;

/**
 * Class RequestInitiatePayment
 *
 * @package Vipps\Model\Payment
 */
class RequestInitiateAgreement
{
    protected $currency = 'NOK';

    protected $customerPhoneNumber;
    protected $interval;
    protected $intervalCount;
    protected $isApp = false;

    protected $merchantRedirectUrl;
    protected $merchantAgreementUrl;
    protected $price;
    protected $productDescription;
    protected $productName;
    //protected $scope = "address birthDate email name phoneNumber";

    public function __construct($phoneNumber, $price, $productName, $productDescription, $interval, $intervalCount, $redirectUrl, $agreementUrl)
    {
        $this->customerPhoneNumber = $phoneNumber;
        $this->price = $price;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->interval = $interval;
        $this->intervalCount = $intervalCount;
        $this->merchantRedirectUrl = $redirectUrl;
        $this->merchantAgreementUrl = $agreementUrl;
    }
}
