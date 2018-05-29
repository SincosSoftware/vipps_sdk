<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\CustomerInfo;
use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Model\Payment\RequestCapturePayment;
use SincosSoftware\Vipps\Model\Payment\Transaction;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestCapturePaymentTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestCapturePayment();
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment::setMerchantInfo()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestCapturePayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment::setTransaction()
     * @covers \SincosSoftware\Vipps\Model\Payment\RequestCapturePayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestCapturePayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
