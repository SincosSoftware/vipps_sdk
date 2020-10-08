<?php

namespace SincosSoftware\Vipps\Model\Agreement;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseGetOrderStatus
 *
 * @package Vipps\Model\Payment
 */
class ResponseGetAllAgreements
{

    /**
     * @var \SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement[]
     * @Serializer\Type("array<SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement>")
     */
    protected $agreements;

}
