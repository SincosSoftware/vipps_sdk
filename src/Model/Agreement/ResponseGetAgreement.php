<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseGetOrderStatus
 *
 * @package Vipps\Model\Payment
 */
class ResponseGetAgreement
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
    protected $start;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $stop;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $productName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $productDescription;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $interval;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $intervalCount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $currency;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $campaign;

    /**
     * Gets status value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets status value.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }
}
