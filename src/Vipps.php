<?php

/**
 * Vipps class.
 *
 * Vipps client handles all requests, has built in factories for all resources.
 */

namespace SincosSoftware\Vipps;

use SincosSoftware\Vipps\Api\Authorization;
use SincosSoftware\Vipps\Api\Payment;
use SincosSoftware\Vipps\Api\Recurring;

/**
 * Class Vipps
 * @package Vipps
 */
class Vipps implements VippsInterface
{

    /**
     * @var \SincosSoftware\Vipps\ClientInterface
     */
    protected $client;

    protected $merchantSerialNumber;

    /**
     * Vipps constructor.
     *
     * @param \SincosSoftware\Vipps\ClientInterface $client
     * @param $merchantSerialNumber
     */
    public function __construct(ClientInterface $client, $merchantSerialNumber)
    {
        $this->client = $client;
        $this->merchantSerialNumber = $merchantSerialNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * {@inheritdoc}
     */
    public function getMerchantSerialNumber()
    {
        return $this->merchantSerialNumber;
    }

    /**
     * @param string $subscription_key
     * @param string $merchant_serial_number
     *
     * @return \SincosSoftware\Vipps\Api\Payment
     */
    public function payment($subscription_key, $merchant_serial_number)
    {
        return new Payment($this, $subscription_key, $merchant_serial_number);
    }

    /**
     * @param string $subscription_key
     * @param string $merchant_serial_number
     *
     * @return \SincosSoftware\Vipps\Api\Recurring
     */
    public function recurring($subscription_key, $merchant_serial_number)
    {
        return new Recurring($this, $subscription_key, $merchant_serial_number);
    }

    /**
     * @param string $subscription_key
     *
     * @return \SincosSoftware\Vipps\Api\Authorization
     */
    public function authorization($subscription_key)
    {
        return new Authorization($this, $subscription_key);
    }
}
