<?php

namespace SincosSoftware\Vipps\Resource\Payment;

use SincosSoftware\Vipps\Model\Payment\RequestCancelPayment;
use SincosSoftware\Vipps\Model\Payment\ResponseCancelPayment;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class CancelPayment
 *
 * @package Vipps\Resource\Payment
 */
class CancelPayment extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::PUT;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/cancel';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     * @param \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment $requestObject
     */
    public function __construct(
        VippsInterface $vipps,
        $subscription_key,
        $order_id,
        RequestCancelPayment $requestObject
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
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseCancelPayment
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseCancelPayment $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseCancelPayment::class,
                'json'
            );

        return $responseObject;
    }
}
