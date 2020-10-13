<?php

namespace SincosSoftware\Vipps\Api;

use SincosSoftware\Vipps\Exceptions\Api\InvalidArgumentException;
use SincosSoftware\Vipps\Model\Agreement\RequestChargeAgreement;
use SincosSoftware\Vipps\Model\Agreement\RequestContinueAgreement;
use SincosSoftware\Vipps\Model\Agreement\RequestInitiateAgreement;
use SincosSoftware\Vipps\Model\Agreement\RequestPauseAgreement;
use SincosSoftware\Vipps\Model\Agreement\RequestRefundCharge;
use SincosSoftware\Vipps\Model\Agreement\RequestStopAgreement;
use SincosSoftware\Vipps\Resource\Agreement\ChargeAgreement;
use SincosSoftware\Vipps\Resource\Agreement\ContinueAgreement;
use SincosSoftware\Vipps\Resource\Agreement\GetAllAgreements;
use SincosSoftware\Vipps\Resource\Agreement\GetChargeStatus;
use SincosSoftware\Vipps\Resource\Agreement\InitiateAgreement;
use SincosSoftware\Vipps\Resource\Agreement\GetAgreement;
use SincosSoftware\Vipps\Resource\Agreement\PauseAgreement;
use SincosSoftware\Vipps\Resource\Agreement\RefundCharge;
use SincosSoftware\Vipps\Resource\Agreement\StopAgreement;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class Payment
 *
 * @package Vipps\Api
 */
class Recurring extends ApiBase implements RecurringInterface
{

    /**
     * @var string
     */
    protected $merchantSerialNumber;

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
     * {@inheritdoc}
     */
    public function initiateAgreement(
        $phoneNumber,
        $price,
        $productName,
        $productDescription,
        $interval,
        $intervalCount,
        $redirectUrl,
        $agreementUrl
    ) {
        // Create Request object based on data passed to this method.
        $request = (new RequestInitiateAgreement(
            $phoneNumber,
            $price,
            $productName,
            $productDescription,
            $interval,
            $intervalCount,
            $redirectUrl,
            $agreementUrl
        ));

        $resource = new InitiateAgreement($this->app, $this->getSubscriptionKey(), $request);

        $response = $resource->call();
        return $response;
    }

    public function getAgreement($agreementId)
    {
        $resource = new GetAgreement($this->app, $this->getSubscriptionKey(), $agreementId);
        return $resource->call();
    }

    public function chargeAgreement($agreementId, $amount, $description)
    {
        $request = new RequestChargeAgreement($amount, $description);

        $resource = new ChargeAgreement($this->app, $this->getSubscriptionKey(), $agreementId, $request);
        return $resource->call();
    }

    public function stopAgreement($agreementId)
    {
        $request = new RequestStopAgreement();
        $resource = new StopAgreement($this->app, $this->getSubscriptionKey(), $agreementId, $request);
        return $resource->call();
    }

    public function pauseAgreement($agreementId)
    {
        $agreement = $this->getAgreement($agreementId);
        $request = new RequestPauseAgreement($agreement);
        $resource = new PauseAgreement($this->app, $this->getSubscriptionKey(), $agreementId, $request);
        return $resource->call();
    }

    public function continueAgreement($agreementId)
    {
        $agreement = $this->getAgreement($agreementId);
        $request = new RequestContinueAgreement($agreement);
        $resource = new ContinueAgreement($this->app, $this->getSubscriptionKey(), $agreementId, $request);
        return $resource->call();
    }

    public function getChargeStatus($agreementId, $chargeId)
    {
        $resource = new GetChargeStatus($this->app, $this->getSubscriptionKey(), $agreementId, $chargeId);
        return $resource->call();
    }

    public function getAll()
    {
        $resource = new GetAllAgreements($this->app, $this->getSubscriptionKey());
        return $resource->call();
    }

    public function refundCharge($agreementId, $chargeId, $amount)
    {
        $request = new RequestRefundCharge($amount);
        $resource = new RefundCharge($this->app, $this->getSubscriptionKey(), $request, $agreementId, $chargeId);
        return $resource->call();
    }
}
