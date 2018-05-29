<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\CustomerInfo;
use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Model\Payment\RequestCancelPayment;
use SincosSoftware\Vipps\Model\Payment\Transaction;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestCancelPaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestCancelPayment();
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment::setMerchantInfo()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestCancelPayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment::setTransaction()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCancelPayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestCancelPayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
