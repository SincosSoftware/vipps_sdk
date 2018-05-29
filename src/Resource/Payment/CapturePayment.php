<?php

namespace SincosSoftware\Vipps\Resource\Payment;

use SincosSoftware\Vipps\Model\Payment\RequestCapturePayment;
use SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class CapturePayment
 *
 * @package Vipps\Resource\Payment
 */
class CapturePayment extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/capture';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     * @param \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment $requestObject
     */
    public function __construct(
        VippsInterface $vipps,
        $subscription_key,
        $order_id,
        RequestCapturePayment $requestObject
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
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseCapturePayment::class,
                'json'
            );

        return $responseObject;
    }
}
