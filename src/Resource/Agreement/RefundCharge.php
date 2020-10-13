<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\RequestRefundCharge;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

class RefundCharge extends AgreementResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements/{id}/charges/{id2}/refund';

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
        RequestRefundCharge $requestObject,
        $agreementId,
        $chargeId
    ) {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $requestObject,
                'json'
            );
        $this->id = $agreementId;
        $this->id2 = $chargeId;
    }


    public function call()
    {
        $response = $this->makeCall();

        if ($response->getStatusCode() == 200) {
            return true;
        }

        return false;
    }
}
