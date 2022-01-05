<?php

namespace SincosSoftware\Vipps;

class SystemInfo implements SystemInfoInterface
{
    private $systemName;

    public function __construct($systemName)
    {
        $this->systemName = $systemName;
    }

    public function getSystemName()
    {
        return $this->systemName;
    }
}