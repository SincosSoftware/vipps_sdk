<?php


namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

class ResponseUpdateAgreement
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $agreementId;

    public function getAgreementId()
    {
        return $this->agreementId;
    }
}