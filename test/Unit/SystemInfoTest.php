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
        $systemInfo = new SystemInfo(
            'Vipps-System-Name',
            'Vipps-System-Version',
            'Vipps-System-Plugin-Name',
            'Vipps-System-Plugin-Version'
        );

        $this->assertEquals('Vipps-System-Name', $systemInfo->getSystemName());
        $this->assertEquals('Vipps-System-Version', $systemInfo->getSystemVersion());
        $this->assertEquals('Vipps-System-Plugin-Name', $systemInfo->getSystemPluginName());
        $this->assertEquals('Vipps-System-Plugin-Version', $systemInfo->getSystemPluginVersion());
    }
}
