<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

class ResponseChargeAgreement
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $chargeId;

    public function getChargeId()
    {
        return $this->chargeId;
    }
}