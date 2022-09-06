<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseRefundPayment
 *
 * @package Vipps\Model\Payment
 */
class ShippingDetails
{
    /**
     * @var \SincosSoftware\Vipps\Model\Payment\Address
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\Address")
     */
    protected $address;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    protected $shippingCost;


    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $shippingMethod;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $shippingMethodId;

    /**
     * Gets address value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Gets shippingCost value.
     *
     * @return float
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * Gets shippingMethod value.
     *
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * Gets shippingMethodId value.
     *
     * @return string
     */
    public function getShippingMethodId()
    {
        return $this->shippingMethodId;
    }


}
