<?php

namespace SincosSoftware\Vipps\Tests\Unit;

use SincosSoftware\Vipps\SystemInfoInterface;

class SystemInfoDummy implements SystemInfoInterface
{
    public function getSystemName()
    {
        return "Vipps-System-Name";
    }

    public function getSystemVersion()
    {
        return 'Vipps-System-Version';
    }

    public function getSystemPluginName()
    {
        return 'Vipps-System-Plugin-Name';
    }

    public function getSystemPluginVersion()
    {
        return 'Vipps-System-Plugin-Version';
    }
}