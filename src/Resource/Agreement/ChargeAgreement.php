<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\RequestChargeAgreement;
use SincosSoftware\Vipps\Model\Agreement\ResponseChargeAgreement;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

class ChargeAgreement extends AgreementResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements/{id}/charges';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     * @param \SincosSoftware\Vipps\Model\Agreement\RequestChargeAgreement $requestObject
     */
    public function __construct(
        VippsInterface $vipps,
        $subscription_key,
        $order_id,
        RequestChargeAgreement $requestObject
    ) {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $requestObject,
                'json'
            );
        $this->id = $order_id;
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseChargeAgreement
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();

        /** @var \SincosSoftware\Vipps\Model\Agreement\ResponseChargeAgreement $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseChargeAgreement::class,
                'json'
            );

        return $responseObject;
    }
}
