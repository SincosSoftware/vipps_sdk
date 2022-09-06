<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseGetPaymentDetails
 *
 * @package Vipps\Model\Payment
 */
class ResponseGetPaymentDetails
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $orderId;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\TransactionSummary
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\TransactionSummary")
     */
    protected $transactionSummary;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\ShippingDetails
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\ShippingDetails")
     */
    protected $shippingDetails;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\UserDetails
     * @Serializer\Type("SincosSoftware\Vipps\Model\Payment\UserDetails")
     */
    protected $userDetails;

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\TransactionLog[]
     * @Serializer\Type("array<SincosSoftware\Vipps\Model\Payment\TransactionLog>")
     */
    protected $transactionLogHistory;

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
     * Gets transactionSummary value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\TransactionSummary
     */
    public function getTransactionSummary()
    {
        return $this->transactionSummary;
    }

    /**
     * Gets transactionSummary value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ShippingDetails
     */
    public function getShippingDetails()
    {
        return $this->shippingDetails;
    }

    /**
     * Gets transactionSummary value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\UserDetails
     */
    public function getUserDetails()
    {
        return $this->userDetails;
    }

    /**
     * Gets transactionLogHistory value.
     *
     * @return \SincosSoftware\Vipps\Model\Payment\TransactionLog[]
     */
    public function getTransactionLogHistory()
    {
        return $this->transactionLogHistory;
    }
}
