<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\RequestRefundPayment;
use SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment;
use SincosSoftware\Vipps\Model\Payment\TransactionInfo;
use SincosSoftware\Vipps\Model\Payment\TransactionSummary;
use SincosSoftware\Vipps\Resource\Payment\RefundPayment;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseRefundPaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new RefundPayment($this->vipps, 'test', 'test', new RequestRefundPayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionInfo' => [],
            ]),
            ResponseRefundPayment::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment::getTransactionInfo()
     */
    public function testTransactionInfo()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseRefundPayment::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }
}
