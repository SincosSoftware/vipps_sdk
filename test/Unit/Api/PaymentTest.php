<?php

namespace SincosSoftware\Vipps\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Api\Payment;
use SincosSoftware\Vipps\Exceptions\Api\InvalidArgumentException;
use SincosSoftware\Vipps\Vipps;

class PaymentTest extends TestCase
{

    /**
     * @covers \SincosSoftware\Vipps\Api\Payment::getMerchantSerialNumber()
     * @covers \SincosSoftware\Vipps\Api\Payment::__construct()
     */
    public function testMerchantSerialNumber()
    {
        $vipps = $this->createMock(Vipps::class);
        $api = new Payment($vipps, 'test_subscription_key', 'test_merchant_serial_number');
        $this->assertEquals('test_merchant_serial_number', $api->getMerchantSerialNumber());
        $api = new Payment($vipps, 'test_subscription_key', null);
        $this->expectException(InvalidArgumentException::class);
        $api->getMerchantSerialNumber();
    }
}
