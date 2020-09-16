<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\RequestInitiateAgreement;
use SincosSoftware\Vipps\Model\Agreement\ResponseInitiateAgreement;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class InitiatePayment
 *
 * @package Vipps\Resource\Payment
 */
class InitiateAgreement extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param \SincosSoftware\Vipps\Model\Agreement\RequestInitiateAgreement $requestObject
     */
    public function __construct(VippsInterface $vipps, $subscription_key, RequestInitiateAgreement $requestObject)
    {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $requestObject,
                'json'
            );
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseInitiateAgreement
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();

        /** @var \SincosSoftware\Vipps\Model\Agreement\ResponseInitiateAgreement $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseInitiateAgreement::class,
                'json'
            );


        return $responseObject;
    }
}
