<?php

namespace SincosSoftware\Vipps\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Api\Authorization;
use SincosSoftware\Vipps\Api\Payment;
use SincosSoftware\Vipps\ClientInterface;
use SincosSoftware\Vipps\Vipps;
use SincosSoftware\Vipps\VippsInterface;

class VippsTest extends TestCase
{

    /**
     * @var \SincosSoftware\Vipps\ClientInterface
     */
    protected $client;

    /**
     * @var \SincosSoftware\Vipps\VippsInterface
     */
    protected $vipps;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->client = $this->createMock(ClientInterface::class);
        $this->vipps = new Vipps($this->client);
    }

    /**
     * @covers \SincosSoftware\Vipps\Vipps::getClient()
     */
    public function testClient()
    {
        $this->assertEquals($this->client, $this->vipps->getClient());
    }

    /**
     * @covers \SincosSoftware\Vipps\Vipps::payment()
     */
    public function testPayment()
    {
        $this->assertInstanceOf(
            Payment::class,
            $this->vipps->payment('test_subscription_key', 'test_merchant_serial_key')
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Vipps::authorization()
     */
    public function testAuthorization()
    {
        $this->assertInstanceOf(Authorization::class, $this->vipps->authorization('test_subscription_key'));
    }

    /**
     * @covers \SincosSoftware\Vipps\Vipps::__construct()
     */
    public function testConstruct()
    {
        $this->assertEquals($this->client, $this->vipps->getClient());
    }
}
