<?php

namespace SincosSoftware\Vipps\Tests\Unit;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Authentication\TokenMemoryCacheStorage;
use SincosSoftware\Vipps\Authentication\TokenStorageInterface;
use SincosSoftware\Vipps\Client;
use SincosSoftware\Vipps\ClientInterface;
use SincosSoftware\Vipps\Endpoint;
use SincosSoftware\Vipps\EndpointInterface;
use SincosSoftware\Vipps\Exceptions\Client\InvalidArgumentException;
use SincosSoftware\Vipps\Tests\Unit\Authentication\TestTokenStorage;

class ClientTest extends TestCase
{

    /**
     * @var \SincosSoftware\Vipps\ClientInterface
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->client = new Client('test');
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::getClientId()
     * @covers \SincosSoftware\Vipps\Client::setClientId()
     */
    public function testClientId()
    {
        $this->assertEquals('test', $this->client->getClientId());
        $this->assertInstanceOf(ClientInterface::class, $this->client->setClientId(null));
        $this->expectException(InvalidArgumentException::class);
        $this->client->getClientId();
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::getEndpoint()
     * @covers \SincosSoftware\Vipps\Client::setEndpoint()
     */
    public function testEndpoint()
    {
        $this->assertEquals('test', $this->client->getEndpoint());
        $this->assertInstanceOf(EndpointInterface::class, $this->client->getEndpoint());
        $this->assertInstanceOf(ClientInterface::class, $this->client->setEndpoint(Endpoint::live()));
        $this->expectException(\Exception::class);
        $this->client->setEndpoint(Endpoint::error());
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::getTokenStorage()
     * @covers \SincosSoftware\Vipps\Client::setTokenStorage()
     */
    public function testTokenStorage()
    {
        $this->client->setTokenStorage(new TestTokenStorage());
        $this->assertInstanceOf(TestTokenStorage::class, $this->client->getTokenStorage());
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::getHttpClient()
     * @covers \SincosSoftware\Vipps\Client::setHttpClient()
     * @covers \SincosSoftware\Vipps\Client::httpClientDiscovery()
     */
    public function testHttpClient()
    {
        $this->assertInstanceOf(HttpClient::class, $this->client->getHttpClient());
        $httpClient = $this->createMock(HttpClient::class);
        $this->assertInstanceOf(Client::class, $this->client->setHttpClient($httpClient));
        $this->expectException(\LogicException::class);
        $this->client->setHttpClient('');
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::getMessageFactory()
     */
    public function testGetMessageFactory()
    {
        $this->assertInstanceOf(MessageFactory::class, $this->client->getMessageFactory());
    }

    /**
     * @covers \SincosSoftware\Vipps\Client::__construct()
     */
    public function testConstruct()
    {
        $client = new Client('test_client_id', [
            'endpoint' => 'test',
            'http_client' => $this->createMock(HttpClient::class),
        ]);
        $this->assertEquals('test_client_id', $client->getClientId());
        $this->assertEquals('test', $client->getEndpoint());
        $this->assertInstanceOf(TokenMemoryCacheStorage::class, $client->getTokenStorage());
        $this->assertInstanceOf(HttpClient::class, $client->getHttpClient());


        $client = new Client('test_client_id', [
            'token_storage' => new TestTokenStorage(),
        ]);
        $this->assertInstanceOf(TestTokenStorage::class, $client->getTokenStorage());
    }
}
