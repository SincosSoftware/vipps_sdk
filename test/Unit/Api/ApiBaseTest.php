<?php

namespace SincosSoftware\Vipps\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use SincosSoftware\Vipps\Api\ApiBase;
use SincosSoftware\Vipps\Client;
use SincosSoftware\Vipps\Exceptions\Api\InvalidArgumentException;
use SincosSoftware\Vipps\Resource\ResourceInterface;
use SincosSoftware\Vipps\Tests\Unit\SystemInfoDummy;
use SincosSoftware\Vipps\Vipps;

class ApiBaseTest extends TestCase
{

    /**
     * @var \SincosSoftware\Vipps\Api\ApiBase
     */
    protected $apiBase;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->apiBase = $this->getMockForAbstractClass(ApiBase::class, [
            new Vipps(new Client('test'), 'merchantSerialNumber', new SystemInfoDummy),
            'test_subscription_key'
        ]);
    }

    /**
     * @covers \SincosSoftware\Vipps\Api\ApiBase::getSubscriptionKey()
     * @covers \SincosSoftware\Vipps\Api\ApiBase::setSubscriptionKey()
     * @covers \SincosSoftware\Vipps\Api\ApiBase::__construct()
     */
    public function testSubscriptionKey()
    {
        $this->assertEquals('test_subscription_key', $this->apiBase->getSubscriptionKey());
        $this->assertInstanceOf(ApiBase::class, $this->apiBase->setSubscriptionKey(null));
        $this->expectException(InvalidArgumentException::class);
        $this->apiBase->getSubscriptionKey();
    }
}
