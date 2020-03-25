<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class MerchantInfo
 *
 * @package Vipps\Model\Payment
 */
class MerchantInfo
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $merchantSerialNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $callbackPrefix;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $fallBack;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    protected $isApp = false;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $paymentType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $shippingDetailsPrefix;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $consentRemovalPrefix;


    /**
     * Gets merchantSerialNumber value.
     *
     * @return string
     */
    public function getMerchantSerialNumber()
    {
        return $this->merchantSerialNumber;
    }

    /**
     * Sets merchantSerialNumber variable.
     *
     * @param string $merchantSerialNumber
     *
     * @return $this
     */
    public function setMerchantSerialNumber($merchantSerialNumber)
    {
        $this->merchantSerialNumber = $merchantSerialNumber;
        return $this;
    }

    /**
     * Gets callBack value.
     *
     * @return string
     */
    public function getCallBack()
    {
        return $this->callbackPrefix;
    }

    /**
     * Sets callBack variable.
     *
     * @param string $callBack
     *
     * @return $this
     */
    public function setCallBack($callBack)
    {
        $this->callbackPrefix = $callBack;
        return $this;
    }

    /**
     * Gets callBack value.
     *
     * @return string
     */
    public function getFallBack()
    {
        return $this->fallBack;
    }

    /**
     * Sets callBack variable.
     *
     * @param string $fallback
     *
     * @return $this
     */
    public function setFallBack($fallback)
    {
        $this->fallBack = $fallback;
        return $this;
    }

    /**
    * Sets shipping variable.
    *
    * @param string $shipping
    *
    * @return $this
    */
    public function setShipping($shipping)
    {
        $this->shippingDetailsPrefix = $shipping;
        $this->setPaymentType();

        return $this;
    }

    /**
     * Gets shipping value.
     *
     * @return string
     */
    public function getShipping()
    {
        return $this->shippingDetailsPrefix;
    }

    /**
     * Sets consent variable.
     *
     * @param string $consent
     *
     * @return $this
     */
    public function setConsent($consent)
    {
        $this->consentRemovalPrefix = $consent;
        $this->setPaymentType();

        return $this;
    }

    /**
     * Gets consent value.
     *
     * @return string
     */
    public function getConsent()
    {
        return $this->consentRemovalPrefix;
    }
}
