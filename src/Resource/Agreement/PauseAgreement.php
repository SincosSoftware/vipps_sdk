<?php

namespace SincosSoftware\Vipps\Resource\Agreement;

use SincosSoftware\Vipps\Model\Agreement\RequestPauseAgreement;
use SincosSoftware\Vipps\Model\Agreement\RequestStopAgreement;
use SincosSoftware\Vipps\Model\Agreement\ResponseGetAgreement;
use SincosSoftware\Vipps\Model\Agreement\ResponseUpdateAgreement;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase;
use SincosSoftware\Vipps\VippsInterface;

class PauseAgreement extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::PUT;

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
    public function __construct(VippsInterface $vipps, $subscription_key, $agreementId, RequestPauseAgreement $request)
    {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $request,
                'json'
            );
        $this->id = $agreementId;
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Agreement\ResponseUpdateAgreement
     */
    public function call()
    {
        $response = $this->makeCall();

        $body = $response->getBody()->getContents();

        /** @var \SincosSoftware\Vipps\Model\Agreement\ResponseUpdateAgreement $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseUpdateAgreement::class,
                'json'
            );

        return $responseObject;
    }
}
