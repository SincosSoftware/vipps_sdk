<?php

namespace SincosSoftware\Vipps\Api;

use SincosSoftware\Vipps\Exceptions\Api\InvalidArgumentException;
use SincosSoftware\Vipps\Model\Payment\CustomerInfo;
use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Model\Payment\RequestCancelPayment;
use SincosSoftware\Vipps\Model\Payment\RequestCapturePayment;
use SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment;
use SincosSoftware\Vipps\Model\Payment\RequestRefundPayment;
use SincosSoftware\Vipps\Model\Payment\Transaction;
use SincosSoftware\Vipps\Resource\Payment\CancelPayment;
use SincosSoftware\Vipps\Resource\Payment\CapturePayment;
use SincosSoftware\Vipps\Resource\Payment\GetOrderStatus;
use SincosSoftware\Vipps\Resource\Payment\GetPaymentDetails;
use SincosSoftware\Vipps\Resource\Payment\InitiatePayment;
use SincosSoftware\Vipps\Resource\Payment\RefundPayment;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class Payment
 *
 * @package Vipps\Api
 */
class Payment extends ApiBase implements PaymentInterface
{

    /**
     * @var string
     */
    protected $merchantSerialNumber;

    /**
     * Gets merchantSerialNumber value.
     *
     * @return string
     */
    public function getMerchantSerialNumber()
    {
        if (empty($this->merchantSerialNumber)) {
            throw new InvalidArgumentException('Missing merchant serial number');
        }
        return $this->merchantSerialNumber;
    }

    /**
     * Payment constructor.
     *
     * Payments API needs one extra param - merchant serial number.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $app
     * @param string $subscription_key
     * @param $merchant_serial_number
     */
    public function __construct(VippsInterface $app, $subscription_key, $merchant_serial_number)
    {
        parent::__construct($app, $subscription_key);
        $this->merchantSerialNumber = $merchant_serial_number;
    }

    /**
     * {@inheritdoc}
     */
    public function cancelPayment($order_id, $text)
    {
        // Build request object from data passed to method.
        $request = (new RequestCancelPayment())
            ->setMerchantInfo(
                (new MerchantInfo())
                    ->setMerchantSerialNumber($this->getMerchantSerialNumber())
            )
            ->setTransaction(
                (new Transaction())
                    ->setTransactionText($text)
            );
        $resource = new CancelPayment($this->app, $this->getSubscriptionKey(), $order_id, $request);
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseCancelPayment $response */
        $response = $resource->call();
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function capturePayment($order_id, $text, $amount = 0)
    {
        // Build request object from data passed to method.
        $request = (new RequestCapturePayment())
            ->setMerchantInfo(
                (new MerchantInfo())
                    ->setMerchantSerialNumber($this->getMerchantSerialNumber())
            )
            ->setTransaction(
                (new Transaction())
                    ->setTransactionText($text)
            );
        // If amount is 0 (default) all remaining founds will be captured.
        if ($amount !== 0) {
            $request->getTransaction()->setAmount($amount);
        }
        $resource = new CapturePayment($this->app, $this->getSubscriptionKey(), $order_id, $request);
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment $response */
        $response = $resource->call();
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderStatus($order_id)
    {
        // Get order status.
        // this is GET request so no need to create request object.
        $resource = new GetOrderStatus(
            $this->app,
            $this->getSubscriptionKey(),
            $this->getMerchantSerialNumber(),
            $order_id
        );
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseGetOrderStatus $response */
        $response = $resource->call();
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentDetails($order_id)
    {
        // Get payment details.
        // this is GET request so no need to create request object.
        $resource = new GetPaymentDetails(
            $this->app,
            $this->getSubscriptionKey(),
            $this->getMerchantSerialNumber(),
            $order_id
        );
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails $response */
        $response = $resource->call();
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function initiatePayment($order_id, $mobile_number, $amount, $text, $callback, $fallback, $shipping = null, $consent = null, $refOrderID = null, $useExplicitCheckoutFlow = false)
    {
        // Create Request object based on data passed to this method.
        $request = (new RequestInitiatePayment())
            ->setCustomerInfo(
                (new CustomerInfo())
                    ->setMobileNumber($mobile_number)
            )
            ->setMerchantInfo(
                (new MerchantInfo())
                    ->setCallBack($callback)
                    ->setMerchantSerialNumber($this->getMerchantSerialNumber())
                    ->setFallBack($fallback)
                    ->setShipping($shipping)
                    ->setConsent($consent)
            )
            ->setTransaction(
                (new Transaction())
                    ->setTransactionText($text)
                    ->setAmount($amount)
                    ->setOrderId($order_id)
                    ->setRefOrderId($refOrderID)
                    ->setUseExplicitCheckoutFlow($useExplicitCheckoutFlow)
            );
        // Pass request object along with all data required by InitiatePayment
        // to make a call.

        $resource = new InitiatePayment($this->app, $this->getSubscriptionKey(), $request);
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment $response */
        $response = $resource->call();
        //dd($response);
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function refundPayment($order_id, $text, $amount = 0)
    {
        // Prepare request object based on data passed to method.
        $request = (new RequestRefundPayment())
            ->setMerchantInfo(
                (new MerchantInfo())
                    ->setMerchantSerialNumber($this->getMerchantSerialNumber())
            )
            ->setTransaction(
                (new Transaction())
                    ->setTransactionText($text)
            );

        // If amount is 0 all remaining founds will be refunded.
        if ($amount !== 0) {
            $request->getTransaction()->setAmount($amount);
        }
        // Create a resource.
        $resource = new RefundPayment($this->app, $this->getSubscriptionKey(), $order_id, $request);
        /** @var \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment $response */
        $response = $resource->call();
        return $response;
    }
}
