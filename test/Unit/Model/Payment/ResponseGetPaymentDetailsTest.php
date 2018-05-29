<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails;
use SincosSoftware\Vipps\Model\Payment\TransactionSummary;
use SincosSoftware\Vipps\Resource\Payment\GetPaymentDetails;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseGetPaymentDetailsTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new GetPaymentDetails($this->vipps, 'test', 'test_merchant_serial_number', 'test_order_id');
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionLogHistory' => [],
            ]),
            ResponseGetPaymentDetails::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseGetPaymentDetails::getTransactionLogHistory()
     */
    public function testTransactionLogHistory()
    {
        $this->assertNotNull($this->model->getTransactionLogHistory());
    }
}
