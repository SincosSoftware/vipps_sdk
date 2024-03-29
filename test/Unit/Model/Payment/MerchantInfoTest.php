<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Payment;

use SincosSoftware\Vipps\Model\Payment\MerchantInfo;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class MerchantInfoTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Payment\MerchantInfo
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = (new MerchantInfo())
            ->setMerchantSerialNumber(12345)
            ->setCallBack('http://example.com')
            ->setFallBack('http://example.com/fallback');
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::getMerchantSerialNumber()
     */
    public function testGetMerchantSerialNumber()
    {
        $this->assertEquals(12345, $this->model->getMerchantSerialNumber());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setMerchantSerialNumber()
     */
    public function testSetMobileNumber()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setMerchantSerialNumber(54321));
        $this->assertEquals('54321', $this->model->getMerchantSerialNumber());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::getCallBack()
     */
    public function testGetCallBack()
    {
        $this->assertEquals('http://example.com', $this->model->getCallBack());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setCallBack()
     */
    public function testSetCallBack()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setCallBack('http://test.example.com'));
        $this->assertEquals('http://test.example.com', $this->model->getCallBack());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::getCallBack()
     */
    public function testGetFallBack()
    {
        $this->assertEquals('http://example.com/fallback', $this->model->getFallBack());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setCallBack()
     */
    public function testSetFallBack()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setFallBack('http://test.example.com/fallback'));
        $this->assertEquals('http://test.example.com/fallback', $this->model->getFallBack());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setShipping()
     */
    public function testSetShipping()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setShipping('http://test.example.com/shipping'));
        $this->assertEquals('http://test.example.com/shipping', $this->model->getShipping());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setConsent()
     */
    public function testSetConsent()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setConsent('http://test.example.com/consent'));
        $this->assertEquals('http://test.example.com/consent', $this->model->getConsent());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setPaymentTypet()
     */
    public function testSetPaymentTypeTrue()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setShipping('http://test.example.com/shipping'));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setConsent('http://test.example.com/consent'));

        $this->assertEquals('eComm Express Payment', $this->model->getPaymentType());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Payment\MerchantInfo::setPaymentTypet()
     */
    public function testSetPaymentTypeFalse()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setShipping(null));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setConsent(null));

        $this->assertEquals(null, $this->model->getPaymentType());
    }
}
