<?php

/**
 * Resource interface.
 *
 * Defines what methods should be implemented by resource.
 */

namespace SincosSoftware\Vipps\Resource;

/**
 * Interface ResourceInterface
 * @package Vipps\Resources
 */
interface ResourceInterface
{
    /**
     * Return URI for resource.
     *
     * Path should start with trailing slash.
     *
     * @return string
     * @throws \LogicException
     */
    public function getPath();

    /**
     * HTTP method.
     *
     * @return \SincosSoftware\Vipps\Resource\HttpMethod
     * @throws \LogicException
     */
    public function getMethod();

    /**
     * HTTP headers.
     *
     * @return array
     * @throws \LogicException
     */
    public function getHeaders();

    /**
     * @return mixed
     */
    public function call();
}
