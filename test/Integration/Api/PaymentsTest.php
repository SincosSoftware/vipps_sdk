<?php

namespace SincosSoftware\Vipps\Tests\Integration\Api;

use SincosSoftware\Vipps\Exceptions\VippsException;
use SincosSoftware\Vipps\Tests\Integration\IntegrationTestBase;

/**
 * Class PaymentsTest
 *
 * @package Vipps\Tests\Integration\Api
 */
class PaymentsTest extends IntegrationTestBase
{

    /**
     * @var string
     */
    protected $merchantSerialNumber = 'test_merchant_serial_number';

    /**
     * @var \SincosSoftware\Vipps\Api\PaymentInterface
     */
    protected $api;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->api = $this->vipps->payment('test_subscription_key', $this->merchantSerialNumber);
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::initiatePayment()
     */
    public function testValidInitiatePayment()
    {
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'url' => 'test_vipps_url'
        ]));

        // Do request.
        $response = $this->api->initiatePayment(
            'test_order_id',
            '98765432',
            1200,
            'test_text',
            'https://www.example.com',
            'https://www.example.com/fallback'
        );
        
        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals('test_vipps_url', $response->getUrl());
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::initiatePayment()
     */
    public function testInvalidInitiatePayment()
    {
        $this->mockResponse(parent::getErrorResponse());
        $this->expectException(VippsException::class);
        $this->api->initiatePayment(
            'test_client_secret',
            '98765432',
            1200,
            'test_text',
            'http://www.example.com',
            'http://www.example.com/fallback'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::capturePayment()
     */
    public function testValidCapturePayment()
    {
        // Mock response.
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'transactionSummary' => [
                'capturedAmount' => 10,
                'remainingAmountToCapture' => 11,
                'refundedAmount' => 12,
                'remainingAmountToRefund' => 13,
            ],
            'transactionInfo' => [
                'amount' => 1200,
                'message' => 'test_message',
                'timeStamp' => '2017-07-31T15:07:37.100Z',
                'status' => 'test_status',
                'transactionId' => 'test_transaction_id',
            ],
        ]));

        // Do request.
        $response = $this->api->capturePayment(
            'test_order_id',
            'test_text',
            12
        );

        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals(10, $response->getTransactionSummary()->getCapturedAmount());
        $this->assertEquals(11, $response->getTransactionSummary()->getRemainingAmountToCapture());
        $this->assertEquals(12, $response->getTransactionSummary()->getRefundedAmount());
        $this->assertEquals(13, $response->getTransactionSummary()->getRemainingAmountToRefund());
        $this->assertEquals(1200, $response->getTransactionInfo()->getAmount());
        $this->assertEquals('test_message', $response->getTransactionInfo()->getMessage());
        $this->assertEquals(
            '2017-07-31T15:07:37',
            $response->getTransactionInfo()->getTimeStamp()->format('Y-m-d\TH:i:s')
        );
        $this->assertEquals('test_status', $response->getTransactionInfo()->getStatus());
        $this->assertEquals('test_transaction_id', $response->getTransactionInfo()->getTransactionId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::cancelPayment()
     */
    public function testValidCancelPayment()
    {

        // Mock response.
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'transactionSummary' => [
                'capturedAmount' => 10,
                'remainingAmountToCapture' => 11,
                'refundedAmount' => 12,
                'remainingAmountToRefund' => 13,
            ],
            'transactionInfo' => [
                'amount' => 1200,
                'message' => 'test_message',
                'timeStamp' => '2017-07-31T15:07:37.100Z',
                'status' => 'test_status',
                'transactionId' => 'test_transaction_id',
            ],
        ]));

        // Do request.
        $response = $this->api->cancelPayment(
            'test_order_id',
            'test_text'
        );

        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals(10, $response->getTransactionSummary()->getCapturedAmount());
        $this->assertEquals(11, $response->getTransactionSummary()->getRemainingAmountToCapture());
        $this->assertEquals(12, $response->getTransactionSummary()->getRefundedAmount());
        $this->assertEquals(13, $response->getTransactionSummary()->getRemainingAmountToRefund());
        $this->assertEquals(1200, $response->getTransactionInfo()->getAmount());
        $this->assertEquals('test_message', $response->getTransactionInfo()->getMessage());
        $this->assertEquals(
            '2017-07-31T15:07:37',
            $response->getTransactionInfo()->getTimeStamp()->format('Y-m-d\TH:i:s')
        );
        $this->assertEquals('test_status', $response->getTransactionInfo()->getStatus());
        $this->assertEquals('test_transaction_id', $response->getTransactionInfo()->getTransactionId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::refundPayment()
     */
    public function testValidRefundPayment()
    {

        // Mock response.
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'transactionSummary' => [
                'capturedAmount' => 10,
                'remainingAmountToCapture' => 11,
                'refundedAmount' => 12,
                'remainingAmountToRefund' => 13,
            ],
            'transactionInfo' => [
                'amount' => 1200,
                'message' => 'test_message',
                'timeStamp' => '2017-07-31T15:07:37.100Z',
                'status' => 'test_status',
                'transactionId' => 'test_transaction_id',
            ],
        ]));

        // Do request.
        $response = $this->api->refundPayment(
            'test_order_id',
            'test_text',
            12
        );

        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals(10, $response->getTransactionSummary()->getCapturedAmount());
        $this->assertEquals(11, $response->getTransactionSummary()->getRemainingAmountToCapture());
        $this->assertEquals(12, $response->getTransactionSummary()->getRefundedAmount());
        $this->assertEquals(13, $response->getTransactionSummary()->getRemainingAmountToRefund());
        $this->assertEquals(1200, $response->getTransactionInfo()->getAmount());
        $this->assertEquals('test_message', $response->getTransactionInfo()->getMessage());
        $this->assertEquals(
            '2017-07-31T15:07:37',
            $response->getTransactionInfo()->getTimeStamp()->format('Y-m-d\TH:i:s')
        );
        $this->assertEquals('test_status', $response->getTransactionInfo()->getStatus());
        $this->assertEquals('test_transaction_id', $response->getTransactionInfo()->getTransactionId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::getOrderStatus()
     */
    public function testValidGetOrderStatus()
    {

        // Mock response.
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'transactionInfo' => [
                'amount' => 1200,
                'message' => 'test_message',
                'timeStamp' => '2017-07-31T15:07:37.100Z',
                'status' => 'test_status',
                'transactionId' => 'test_transaction_id',
            ],
        ]));

        // Do request.
        $response = $this->api->getOrderStatus(
            'test_order_id'
        );

        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals(1200, $response->getTransactionInfo()->getAmount());
        $this->assertEquals('test_message', $response->getTransactionInfo()->getMessage());
        $this->assertEquals(
            '2017-07-31T15:07:37',
            $response->getTransactionInfo()->getTimeStamp()->format('Y-m-d\TH:i:s')
        );
        $this->assertEquals('test_status', $response->getTransactionInfo()->getStatus());
        $this->assertEquals('test_transaction_id', $response->getTransactionInfo()->getTransactionId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::getPaymentDetails()
     */
    public function testValidGetPaymentDetails()
    {

        // Mock response.
        $this->mockResponse(parent::getResponse([
            'orderId' => 'test_order_id',
            'transactionSummary' => [
                'capturedAmount' => 10,
                'remainingAmountToCapture' => 11,
                'refundedAmount' => 12,
                'remainingAmountToRefund' => 13,
            ],
            'transactionLogHistory' => [[
                'amount' => 1200,
                'transactionText' => 'test_transaction_text',
                'timeStamp' => '2017-07-31T15:07:37.100Z',
                'operation' => 'test_operation',
                'transactionId' => 'test_transaction_id',
                'requestId' => 'test_request_id',
            ]],
        ]));

        // Do request.
        $response = $this->api->getPaymentDetails(
            'test_order_id'
        );

        // Assert response.
        $this->assertEquals('test_order_id', $response->getOrderId());
        $this->assertEquals(10, $response->getTransactionSummary()->getCapturedAmount());
        $this->assertEquals(11, $response->getTransactionSummary()->getRemainingAmountToCapture());
        $this->assertEquals(12, $response->getTransactionSummary()->getRefundedAmount());
        $this->assertEquals(13, $response->getTransactionSummary()->getRemainingAmountToRefund());
        $this->assertEquals(1200, $response->getTransactionLogHistory()[0]->getAmount());
        $this->assertEquals('test_transaction_text', $response->getTransactionLogHistory()[0]->getTransactionText());
        $this->assertEquals(
            '2017-07-31T15:07:37',
            $response->getTransactionLogHistory()[0]->getTimeStamp()->format('Y-m-d\TH:i:s')
        );
        $this->assertEquals('test_operation', $response->getTransactionLogHistory()[0]->getOperation());
        $this->assertEquals('test_transaction_id', $response->getTransactionLogHistory()[0]->getTransactionId());
        $this->assertEquals('test_request_id', $response->getTransactionLogHistory()[0]->getRequestId());
    }
}
