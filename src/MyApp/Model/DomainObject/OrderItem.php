<?php


namespace MyApp\Model\DomainObject;


class OrderItem
{
    private $userId;
    private $tierId;

    /**
     * OrderItem constructor.
     * @param $userId
     * @param $tierId
     */
    public function __construct($userId, $tierId)
    {
        $this->userId = $userId;
        $this->tierId = $tierId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTierId()
    {
        return $this->tierId;
    }

    /**
     * @param mixed $tierId
     */
    public function setTierId($tierId): void
    {
        $this->tierId = $tierId;
    }
}