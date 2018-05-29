<?php

namespace SincosSoftware\Vipps\Resource\Payment;

use SincosSoftware\Vipps\Model\Payment\ResponseGetOrderStatus;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

class GetOrderStatus extends PaymentResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/Ecomm/v2/payments/{id}/status';

    /**
     * InitiatePayment constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $merchant_serial_number
     * @param string $order_id
     */
    public function __construct(VippsInterface $vipps, $subscription_key, $merchant_serial_number, $order_id)
    {
        parent::__construct($vipps, $subscription_key);
        $this->id = $order_id;
        $this->path = str_replace('{merchantSerialNumber}', $merchant_serial_number, $this->path);
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseGetOrderStatus
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseGetOrderStatus $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseGetOrderStatus::class,
                'json'
            );

        return $responseObject;
    }
}
