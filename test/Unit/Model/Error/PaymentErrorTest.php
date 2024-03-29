<?php

namespace SincosSoftware\Vipps\Tests\Unit\Model\Error;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use SincosSoftware\Vipps\Model\Error\PaymentError;
use SincosSoftware\Vipps\Tests\Unit\Model\ModelTestBase;

class PaymentErrorTest extends ModelTestBase
{

    /**
     * @var \SincosSoftware\Vipps\Model\Error\PaymentError
     */
    protected $response;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        AnnotationRegistry::registerLoader('class_exists');
        $serializer = SerializerBuilder::create()->build();
        $this->response = $serializer->deserialize(
            json_encode([
                'errorGroup' => 'test_error_group',
                'errorCode' => 'test_error_code',
                'errorMessage' => 'test_error_message',
            ]),
            PaymentError::class,
            'json'
        );
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Error\PaymentError::getErrorGroup()
     */
    public function testGetErrorGroup()
    {
        $this->assertEquals('test_error_group', $this->response->getErrorGroup());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Error\PaymentError::getErrorMessage()
     */
    public function testGetErrorMessage()
    {
        $this->assertEquals('test_error_message', $this->response->getErrorMessage());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Error\PaymentError::getErrorCode()
     */
    public function testGetErrorCode()
    {
        $this->assertEquals('test_error_code', $this->response->getErrorCode());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Error\PaymentError::getCode()
     */
    public function testGetCode()
    {
        $this->assertEquals('test_error_code', $this->response->getCode());
    }

    /**
     * @covers \SincosSoftware\Vipps\Model\Error\PaymentError::getMessage()
     */
    public function testGetMessage()
    {
        $this->assertEquals('test_error_message', $this->response->getMessage());
    }
}
