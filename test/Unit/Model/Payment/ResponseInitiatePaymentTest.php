<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment;
use SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment;
use SincosSoftware\Vipps\Model\Payment\TransactionInfo;
use SincosSoftware\Vipps\Model\Payment\TransactionSummary;
use SincosSoftware\Vipps\Resource\Payment\InitiatePayment;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseInitiatePaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new InitiatePayment($this->vipps, 'test', new RequestInitiatePayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'url' => 'test_vipps_url'
            ]),
            ResponseInitiatePayment::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\ResponseInitiatePayment::getUrl()
     */
    public function testUrl()
    {
        $this->assertEquals('test_vipps_url', $this->model->getUrl());
    }

}
