<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\ResponseGetChargeStatus;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

class GetChargeStatus extends AgreementResourceBase
{
    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements/{id}/charges/{id2}';

    public function __construct(VippsInterface $vipps, $subscription_key,  $agreement_id, $charge_id)
    {
        parent::__construct($vipps, $subscription_key);
        $this->id = $agreement_id;
        $this->id2 = $charge_id;
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseGetChargeStatus
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();

        /** @var \SincosSoftware\Vipps\Model\Agreement\ResponseGetChargeStatus $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseGetChargeStatus::class,
                'json'
            );

        return $responseObject;
    }
}
