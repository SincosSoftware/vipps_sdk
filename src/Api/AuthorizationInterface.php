<?php
/**
 * Created by PhpStorm.
 * User: SincosSoftware
 * Date: 24.07.17
 * Time: 14:54
 */

namespace SincosSoftware\Vipps\Api;

interface AuthorizationInterface
{

    /**
     * @param string $client_secret
     *
     * @return \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken
     */
    public function getToken($client_secret);
}
