<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase;
use SincosSoftware\Vipps\VippsInterface;

class GetAgreement extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/recurring/v2/agreements/{id}';


    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $merchant_serial_number
     * @param string $order_id
     */
    public function __construct(VippsInterface $vipps, $subscription_key, $agreementId)
    {
        parent::__construct($vipps, $subscription_key);
        $this->id = $agreementId;
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement
     */
    public function call()
    {
        $response = $this->makeCall();

        $body = $response->getBody()->getContents();

        /** @var \SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseGetAgreement::class,
                'json'
            );

        return $responseObject;

    }
}
