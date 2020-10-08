<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase;
use SincosSoftware\Vipps\VippsInterface;

class GetAllAgreements extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     */
    public function __construct(VippsInterface $vipps, $subscription_key)
    {
        parent::__construct($vipps, $subscription_key);
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement
     */
    public function call()
    {
        $response = $this->makeCall();

        $body = $response->getBody()->getContents();

        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                'array<array>',
                'json'
            );

        return $responseObject;
    }
}
