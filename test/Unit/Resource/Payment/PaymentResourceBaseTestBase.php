<?php

namespace SincosSoftware\Vipps\Tests\Unit\Resource\Payment;

use SincosSoftware\Vipps\Tests\Unit\Resource\ResourceTestBase;

class PaymentResourceBaseTestBase extends ResourceTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\ResourceInterface
     */
    protected $resource;

    /**
     * @covers \SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase::__construct
     * @covers \SincosSoftware\Vipps\Resource\Payment\PaymentResourceBase::getHeaders()
     */
    public function testHeaders()
    {
        $headers = $this->resource->getHeaders();
        $this->assertArrayHasKey('X-App-Id', $headers);
        $this->assertEquals('test_client_id', $headers['X-App-Id']);
        $this->assertArrayHasKey('Content-Type', $headers);
        $this->assertEquals('application/json', $headers['Content-Type']);
        $this->assertArrayHasKey('X-Source-Address', $headers);
        $this->assertNotEmpty($headers['X-Source-Address']);
        $this->assertArrayHasKey('X-TimeStamp', $headers);
        $this->assertNotEmpty($headers['X-TimeStamp']);
        $this->assertArrayHasKey('X-Request-Id', $headers);
        $this->assertNotEmpty($headers['X-Request-Id']);

        $this->assertArrayHasKey('Merchant-Serial-Number', $headers);
        $this->assertNotEmpty($headers['Merchant-Serial-Number']);
    }
}
