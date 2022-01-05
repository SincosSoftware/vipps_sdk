<?php

namespace SincosSoftware\Vipps\Tests\Unit\Resource;

use Http\Client\HttpClient;
use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Client;
use SincosSoftware\Vipps\Tests\Unit\Authentication\TestTokenStorage;
use SincosSoftware\Vipps\Tests\Unit\SystemInfoDummy;
use SincosSoftware\Vipps\Vipps;

abstract class ResourceTestBase extends TestCase
{

    /**
     * @var \SincosSoftware\Vipps\Vipps
     */
    protected $vipps;

    /**
     * @var \SincosSoftware\Vipps\Client
     */
    protected $client;

    /**
     * @var \Http\Client\HttpClient
     */
    protected $httpClient;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->httpClient = $this->createMock(HttpClient::class);
        $this->client = new Client('test_client_id', [
            'http_client' => $this->httpClient,
            'token_storage' => new TestTokenStorage(),
        ]);
        $this->vipps = new Vipps($this->client, 'merchantSerialNumber', new SystemInfoDummy);
    }
}
