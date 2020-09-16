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

    public function setAgreementResource($agreementResource)
    {
        $this->agreementResource = $agreementResource;
        return $this;
    }

    public function getAgreementResource()
    {
        return $this->agreementResource;
    }

    public function setUrl($vippsConfirmationUrl)
    {
        $this->vippsConfirmationUrl = $vippsConfirmationUrl;
        return $this;
    }

    public function getUrl()
    {
        return $this->vippsConfirmationUrl;
    }
}
