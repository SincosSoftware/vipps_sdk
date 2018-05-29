<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\CustomerInfo;
use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Model\Payment\RequestRefundPayment;
use SincosSoftware\Vipps\Model\Payment\Transaction;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestRefundPaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\RequestRefundPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestRefundPayment();
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestRefundPayment::setMerchantInfo()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestRefundPayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestRefundPayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestRefundPayment::setTransaction()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestRefundPayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestRefundPayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
