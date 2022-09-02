<?php

namespace SincosSoftware\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseRefundPayment
 *
 * @package Vipps\Model\Payment
 */
class UserDetails
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $bankIdVerified;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $mobileNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $userId;

    /**
     * @return string
     */
    public function getBankIdVerified()
    {
        return $this->bankIdVerified;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

}
