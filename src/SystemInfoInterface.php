<?php

namespace SincosSoftware\Vipps;

interface SystemInfoInterface
{
    public function getSystemName();
    public function getSystemVersion();
    public function getSystemPluginName();
    public function getSystemPluginVersion();
}