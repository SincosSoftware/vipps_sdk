<?php

namespace SincosSoftware\Vipps;

class SystemInfo implements SystemInfoInterface
{
    private $systemName;
    private $systemVersion;
    private $systemPluginName;
    private $systemPluginVersion;

    public function __construct($systemName, $systemVersion, $systemPluginName, $systemPluginVersion)
    {
        $this->systemName = $systemName;
        $this->systemVersion = $systemVersion;
        $this->systemPluginName = $systemPluginName;
        $this->systemPluginVersion = $systemPluginVersion;
    }

    public function getSystemName()
    {
        return $this->systemName;
    }

    public function getSystemVersion()
    {
        return $this->systemVersion;
    }

    public function getSystemPluginName()
    {
        return $this->systemPluginName;
    }

    public function getSystemPluginVersion()
    {
        return $this->systemPluginVersion;
    }
}