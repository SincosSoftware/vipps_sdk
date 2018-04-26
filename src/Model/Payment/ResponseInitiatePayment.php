<?php

namespace zaporylie\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseInitiatePayment
 *
 * @package Vipps\Model\Payment
 */
class ResponseInitiatePayment
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $orderId;


    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $url;

    /**
     * Gets orderId value.
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Gets url value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

}
