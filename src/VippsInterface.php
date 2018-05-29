<?php

/**
 * Vipps interface.
 *
 * Provide Vipps client interface.
 */

namespace SincosSoftware\Vipps;

/**
 * Interface VippsInterface
 * @package Vipps
 */
interface VippsInterface
{

    /**
     * @return \SincosSoftware\Vipps\ClientInterface
     */
    public function getClient();

    /**
     * @param string $subscription_key
     *
     * @return \SincosSoftware\Vipps\Api\Authorization
     */
    public function authorization($subscription_key);

    /**
     * @param string $subscription_key
     * @param string $merchant_serial_number
     *
     * @return \SincosSoftware\Vipps\Api\Payment
     */
    public function payment($subscription_key, $merchant_serial_number);
}
