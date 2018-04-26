<?php

namespace zaporylie\Vipps\Tests\Unit\Model\Payment;

use zaporylie\Vipps\Model\Payment\RequestInitiatePayment;
use zaporylie\Vipps\Model\Payment\ResponseInitiatePayment;
use zaporylie\Vipps\Model\Payment\TransactionInfo;
use zaporylie\Vipps\Model\Payment\TransactionSummary;
use zaporylie\Vipps\Resource\Payment\InitiatePayment;
use zaporylie\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseInitiatePaymentTest extends ModelTestBase
{

    /**
     * @var \zaporylie\Vipps\Model\Payment\ResponseInitiatePayment
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
     * @covers \zaporylie\Vipps\Model\Payment\ResponseInitiatePayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \zaporylie\Vipps\Model\Payment\ResponseInitiatePayment::getUrl()
     */
    public function testUrl()
    {
        $this->assertEquals('test_vipps_url', $this->model->getUrl());
    }

}
