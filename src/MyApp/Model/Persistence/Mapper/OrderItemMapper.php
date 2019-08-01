<?php


namespace MyApp\Model\Persistence\Mapper;

use MyApp\Model\DomainObject\Tier;
use MyApp\Model\DomainObject\User;
use PDO;


class OrderItemMapper extends AbstractMapper
{
    public function insert(int $tierId, int $userId)
    {
        //TODO: transform Product to array row then prepare an INSERT ($this->getPdo()) and execute
        $sql = "insert into order_item (user_id, tier_id, created_at) values (?, ?, ?)";
        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue(1, $userId, PDO::PARAM_INT);
        $statement->bindValue(2, $tierId, PDO::PARAM_INT);
        $statement->bindValue(3, date('Y-m-d'),PDO::PARAM_STR);

        $statement->execute();
    }
}