<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class RequestInitiatePayment
 *
 * @package Vipps\Model\Payment
 */
class RequestInitiatePayment
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\MerchantInfo
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\MerchantInfo")
     */
    protected $merchantInfo;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\CustomerInfo
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\CustomerInfo")
     */
    protected $customerInfo;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\Transaction
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\Transaction")
     */
    protected $transaction;

    /**
     * Gets merchantInfo value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\MerchantInfo
     */
    public function getMerchantInfo()
    {
        return $this->merchantInfo;
    }

    /**
     * Sets merchantInfo variable.
     *
     * @param \SincosSoftware\Vipps\Model\Payment\MerchantInfo $merchantInfo
     *
     * @return $this
     */
    public function setMerchantInfo(MerchantInfo $merchantInfo)
    {
        $this->merchantInfo = $merchantInfo;
        return $this;
    }

    /**
     * Gets customerInfo value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\CustomerInfo
     */
    public function getCustomerInfo()
    {
        return $this->customerInfo;
    }

    /**
     * Sets customerInfo variable.
     *
     * @param \SincosSoftware\Vipps\Model\Payment\CustomerInfo $customerInfo
     *
     * @return $this
     */
    public function setCustomerInfo(CustomerInfo $customerInfo)
    {
        $this->customerInfo = $customerInfo;
        return $this;
    }

    /**
     * Gets transaction value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Sets transaction variable.
     *
     * @param \SincosSoftware\Vipps\Model\Payment\Transaction $transaction
     *
     * @return $this
     */
    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }
}
