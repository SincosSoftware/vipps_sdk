<?php

namespace SincosSoftware\Vipps\Tests\Unit\Resource\Payment;

use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use SincosSoftware\Vipps\Model\Payment\RequestCapturePayment;
use SincosSoftware\Vipps\Model\Payment\ResponseCapturePayment;
use SincosSoftware\Vipps\Resource\Payment\CapturePayment;
use SincosSoftware\Vipps\Resource\HttpMethod;

class CapturePaymentTest extends PaymentResourceBaseTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\Payment\CapturePayment
     */
    protected $resource;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->resource = $this->getMockBuilder(CapturePayment::class)
            ->setConstructorArgs([$this->vipps, 'test_subscription_key', 'test_order_id', new RequestCapturePayment()])
            ->disallowMockingUnknownTypes()
            ->setMethods(['makeCall'])
            ->getMock();

        $this->resource
            ->expects($this->any())
            ->method('makeCall')
            ->will($this->returnValue(new Response(200, [], stream_for(json_encode([])))));
    }

    /**
     * @covers \SincosSoftware\Vipps\Resource\Payment\CapturePayment::getBody()
     * @covers \SincosSoftware\Vipps\Resource\Payment\CapturePayment::__construct()
     */
    public function testBody()
    {
        $this->assertNotEmpty($this->resource->getBody());
        // Valid JSON.
        $this->assertNotNull(json_decode($this->resource->getBody()));
    }

    /**
     * @covers \SincosSoftware\Vipps\Resource\Payment\CapturePayment::getMethod()
     */
    public function testMethod()
    {
        $this->assertEquals(HttpMethod::POST, $this->resource->getMethod());
    }

    /**
     * @covers \SincosSoftware\Vipps\Resource\Payment\CapturePayment::getPath()
     */
    public function testPath()
    {
        $this->assertEquals('/ecomm/v2/payments/test_order_id/capture', $this->resource->getPath());
    }

    /**
     * @covers \SincosSoftware\Vipps\Resource\Payment\CapturePayment::call()
     */
    public function testCall()
    {
        $this->assertInstanceOf(ResponseCapturePayment::class, $response = $this->resource->call());
        $this->assertEquals(new ResponseCapturePayment(), $response);
    }
}
