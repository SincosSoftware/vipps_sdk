<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseGetOrderStatus
 *
 * @package Vipps\Model\Payment
 */
class ResponseGetChargeStatus
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $status;

    /**
     * @var string
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     */
    protected $due;

    /**
     * @var string
     * @Serializer\Type("integer")
     */
    protected $amount;

    /**
     * @var string
     * @Serializer\Type("integer")
     */
    protected $amountRefunded;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $transactionId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $type;

    /**
     * Gets status value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getDueDate()
    {
        return $this->due;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAmountRefunded()
    {
        return $this->amountRefunded;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
    }
}
