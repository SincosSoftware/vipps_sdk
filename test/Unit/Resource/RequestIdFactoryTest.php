<?php

namespace SincosSoftware\Vipps\Tests\Unit\Resource;

use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\Resource\RequestIdFactory;

class RequestIdFactoryTest extends TestCase
{

    /**
     * @covers \SincosSoftware\Vipps\Resource\RequestIdFactory::generate()
     */
    public function testGenerate()
    {
        $request_id = RequestIdFactory::generate();
        $this->assertLessThan(30, strlen($request_id));
        $this->assertNotEmpty($request_id);
    }
}
