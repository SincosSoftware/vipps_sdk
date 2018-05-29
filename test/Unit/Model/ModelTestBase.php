<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Authentication\TokenStorageInterface;
use SincosSoftware\Vipps\Client;
use SincosSoftware\Vipps\Tests\Unit\Authentication\TestTokenStorage;
use SincosSoftware\Vipps\Vipps;

abstract class ModelTestBase extends TestCase
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

        $token = new TestTokenStorage();

        // Create Client stub.
        $this->client = $this->createMock(Client::class);
        $this->client
            ->expects($this->any())
            ->method('getClientId')
            ->willReturn('foo');

        $this->client
            ->expects($this->any())
            ->method('getTokenStorage')
            ->will($this->returnValue($token));


        // Get Vipps.
        $this->vipps = new Vipps($this->client);
    }
}
