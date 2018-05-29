<?php

namespace SincosSoftware\Vipps\Authentication;

use SincosSoftware\Vipps\Model\Authorization\ResponseGetToken;

/**
 * Interface TokenStorageInterface
 *
 * @package Vipps\Authentication
 */
interface TokenStorageInterface
{

    /**
     * @return \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken
     * @throws \SincosSoftware\Vipps\Exceptions\Authentication\InvalidArgumentException
     */
    public function get();

    /**
     * @param \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken $token
     *
     * @return self
     */
    public function set(ResponseGetToken $token);

    /**
     * @return bool
     */
    public function has();

    /**
     * @return self
     */
    public function delete();

    /**
     * @return self
     */
    public function clear();
}
