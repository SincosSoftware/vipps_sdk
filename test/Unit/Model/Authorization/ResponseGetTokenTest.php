<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Authorization;

use SincosSoftware\Vipps\Model\Authorization\ResponseGetToken;
use SincosSoftware\Vipps\Resource\Authorization\GetToken;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseGetTokenTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\Authorization\GetToken
     */
    protected $resource;

    /**
     * @var \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken
     */
    protected $response;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->resource = new GetToken($this->vipps, 'test', 'test');
        $this->response = $this->resource->getSerializer()->deserialize(
            json_encode((object) [
                'access_token' => 'test_access_token',
                'token_type' => 'test_token_type',
                'resource' => 'test_resource',
                'expires_in' => 123,
                'ext_expires_in' => 123,
                'expires_on' => (new \DateTime())->format('U'),
                'not_before' => (new \DateTime())->format('U'),
            ]),
            ResponseGetToken::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getAccessToken()
     */
    public function testGetAccessToken()
    {
        $this->assertEquals('test_access_token', $this->response->getAccessToken());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getExpiresIn()
     */
    public function testGetExpiresIn()
    {
        $this->assertEquals(123, $this->response->getExpiresIn());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getExtExpiresIn()
     */
    public function testGetExtExpiresIn()
    {
        $this->assertEquals(123, $this->response->getExtExpiresIn());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getExpiresOn()
     */
    public function testGetExpiresOn()
    {
        $this->assertInstanceOf(\DateTimeInterface::class, $this->response->getExpiresOn());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getNotBefore()
     */
    public function testGetNotBefore()
    {
        $this->assertInstanceOf(\DateTimeInterface::class, $this->response->getNotBefore());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getResource()
     */
    public function testGetResource()
    {
        $this->assertEquals('test_resource', $this->response->getResource());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken::getTokenType()
     */
    public function testGetTokenType()
    {
        $this->assertEquals('test_token_type', $this->response->getTokenType());
    }
}
