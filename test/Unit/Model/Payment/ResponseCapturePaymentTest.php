<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\RequestCapturePayment;
use SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment;
use SincosSoftware\Vipps\Model\Payment\TransactionInfo;
use SincosSoftware\Vipps\Model\Payment\TransactionSummary;
use SincosSoftware\Vipps\Resource\Payment\CapturePayment;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseCapturePaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new CapturePayment($this->vipps, 'test', 'test', new RequestCapturePayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionInfo' => [],
            ]),
            ResponseCapturePayment::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment::getTransactionInfo()
     */
    public function testTransactionInfo()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }
}
