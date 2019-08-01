<?php


namespace MyApp\Model\Persistence\Mapper;


use MyApp\Model\DomainObject\Tier;

use PDO;

class TierMapper extends AbstractMapper
{
    public function insert(Tier $tier)
    {
        //TODO: transform Product to array row then prepare an INSERT ($this->getPdo()) and execute
        $row = $this->translateToArray($tier);
        $sql = "insert into tier (price, path_with_watermark, path_without_watermark, size, product_id) values (?, ?, ?, ?, ?)";
        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue(1,$row['price'], PDO::PARAM_STR);
        $statement->bindValue(2,$row['pathWithWaterMark'], PDO::PARAM_STR);
        $statement->bindValue(3,$row['pathWithoutWaterMark'],PDO::PARAM_STR);
        $statement->bindValue(4,$row['size'],PDO::PARAM_STR);
        $statement->bindValue(5,$row['productId'],PDO::PARAM_STR);

        var_dump($statement->execute());
        $statement->errorInfo();
        var_dump($row);

    }

    private function translateToArray(Tier $tier): array
    {
        // TODO: you may extract this array to a constant in this class, the app config, or you can use reflection
        // to obtain all the properties of Product dynamically then by convention obtain the columns to map to (next level)
        $row = [
            'id'    => $tier->getId(),
            'price' => $tier->getPrice(),
            'pathWithWaterMark' => $tier->getPathWithWatermark(),
            'pathWithoutWaterMark' => $tier->getPathWithoutWatermark(),
            'size' => $tier->getSize(),
            'productId' => $tier->getProductId()
            // TODO: handle the rest of fields
        ];

        return $row;
    }
}