<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseRefundPayment
 *
 * @package Vipps\Model\Payment
 */
class Address
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $addressLine1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $addressLine2;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $city;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $postCode;

    /**
     * Gets addressLine1 value.
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Gets addressLine2 value.
     *
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Gets city value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Gets country value.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Gets postCode value.
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }
}
