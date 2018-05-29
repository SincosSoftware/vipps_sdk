<?php

namespace SincosSoftware\Vipps\Tests\Unit;

use Eloquent\Enumeration\Exception\UndefinedMemberException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriInterface;
use SincosSoftware\Vipps\Endpoint;
use SincosSoftware\Vipps\EndpointInterface;

class EndpointTest extends TestCase
{

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @covers \SincosSoftware\Vipps\Endpoint::__construct()
     * @covers \SincosSoftware\Vipps\Endpoint::initializeMembers()
     */
    public function testAllowedEndpoints()
    {
        $this->assertInstanceOf(EndpointInterface::class, Endpoint::test());
        $this->assertInstanceOf(EndpointInterface::class, Endpoint::live());
        $this->expectException(UndefinedMemberException::class);
        Endpoint::foo();
    }

    /**
     * @covers \SincosSoftware\Vipps\Endpoint::getScheme()
     * @covers \SincosSoftware\Vipps\Endpoint::getHost()
     * @covers \SincosSoftware\Vipps\Endpoint::getPort()
     * @covers \SincosSoftware\Vipps\Endpoint::getPath()
     * @covers \SincosSoftware\Vipps\Endpoint::getUri()
     */
    public function testGetters()
    {
        $endpoint = Endpoint::test();
        $this->assertNotEmpty($endpoint->getScheme());
        $this->assertNotEmpty($endpoint->getHost());
        $this->assertNotEmpty($endpoint->getPort());
        $this->assertNotNull($endpoint->getPath());
        $this->assertInstanceOf(UriInterface::class, $endpoint->getUri());
    }
}
