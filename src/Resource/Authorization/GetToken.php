<?php

namespace SincosSoftware\Vipps\Resource\Authorization;

use SincosSoftware\Vipps\Model\Authorization\ResponseGetToken;
use SincosSoftware\Vipps\Resource\ResourceBase;
use SincosSoftware\Vipps\Resource\HttpMethod;
use SincosSoftware\Vipps\VippsInterface;

/**
 * Class GetToken
 *
 * @package Vipps\Resource\Authorization
 */
class GetToken extends ResourceBase
{

    /**
     * @var \SincosSoftware\Vipps\Resource\HttpMethod;
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/accessToken/get';

    /**
     * GetToken constructor.
     *
     * @param \SincosSoftware\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $client_secret
     */
    public function __construct(VippsInterface $vipps, $subscription_key, $client_secret)
    {
        parent::__construct($vipps, $subscription_key);
        // Authorization module requires client_id to be set on "client_id"
        // header.
        $this->headers['client_id'] = $this->app->getClient()->getClientId();
        $this->headers['client_secret'] = $client_secret;
    }

    /**
     * @return \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken
     */
    public function call()
    {
        $response = $this->makeCall();
        /** @var \SincosSoftware\Vipps\Model\Authorization\ResponseGetToken $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $response->getBody()->getContents(),
                ResponseGetToken::class,
                'json'
            );

        return $responseObject;
    }
}
