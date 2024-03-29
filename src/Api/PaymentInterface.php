<?php

namespace SincosSoftware\Vipps\Api;

/**
 * Interface PaymentInterface
 *
 * @package Vipps\Api
 */
interface PaymentInterface
{

    /**
     * @param string $order_id
     * @param string $text
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseCancelPayment
     */
    public function cancelPayment($order_id, $text);

    /**
     * @param string $order_id
     * @param string $text
     * @param int $amount
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment
     */
    public function capturePayment($order_id, $text, $amount = 0);

    /**
     * @param string $order_id
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseGetOrderStatus
     */
    public function getOrderStatus($order_id);

    /**
     * @param string $order_id
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails
     */
    public function getPaymentDetails($order_id);

    /**
     * @param string $order_id
     * @param string $mobile_number
     * @param int $amount
     * @param string $text
     * @param string $callback
     * @oaram string $fallback
     * @param string $shipping
     * @param string $consent
     * @param null $refOrderID
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment
     * @oaram string $fallback
     */
    public function initiatePayment(
        $order_id,
        $mobile_number,
        $amount,
        $text,
        $callback,
        $fallback,
        $shipping = null,
        $consent = null,
        $refOrderID = null
    );

    /**
     * @param string $order_id
     * @param string $text
     * @param int $amount
     *
     * @return \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment
     */
    public function refundPayment($order_id, $text, $amount = 0);
}
