<?php

namespace SincosSoftware\Vipps\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SincosSoftware\Vipps\SystemInfo;

class SystemInfoTest extends TestCase
{
    /**
     * @covers \SincosSoftware\Vipps\SystemInfo::__construct()
     */
    public function testConstruct()
    {
        $systemInfo = new SystemInfo('Vipps-System-Name');

        $this->assertEquals('Vipps-System-Name', $systemInfo->getName());
    }
}
