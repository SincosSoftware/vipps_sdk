<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class RequestInitiatePayment
 *
 * @package Vipps\Model\Payment
 */
class ResponseInitiateAgreement
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $agreementId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $vippsConfirmationUrl;


    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $agreementResource;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $chargeId;


    public function setAgreementId($agreementId)
    {
        $this->agreementId = $agreementId;
        return $this;
    }

    public function getAgreementId()
    {
        return $this->agreementId;
    }
}
