<?php

namespace SincosSoftware\Vipps\Api;

/**
 * Interface AgreementInterface
 *
 * @package Vipps\Api
 */
interface RecurringInterface
{
    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseInitiateAgreement
     */
    public function initiateAgreement($phoneNumber, $price, $productName, $productDescription, $interval, $intervalCount, $redirectUrl, $agrementUrl);

}
