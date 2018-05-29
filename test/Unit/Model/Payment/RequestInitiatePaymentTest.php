<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\CustomerInfo;
use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment;
use SincosSoftware\Vipps\Model\Payment\Transaction;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestInitiatePaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestInitiatePayment();
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::setMerchantInfo()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestInitiatePayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::setCustomerInfo()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::getCustomerInfo()
     */
    public function testCustomerInfo()
    {
        $this->assertNull($this->model->getCustomerInfo());
        $this->assertInstanceOf(RequestInitiatePayment::class, $this->model->setCustomerInfo(new CustomerInfo()));
        $this->assertInstanceOf(CustomerInfo::class, $this->model->getCustomerInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::setTransaction()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestInitiatePayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestInitiatePayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
