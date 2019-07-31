<?php


namespace MyApp\Model\Persistence\Finder;

use MyApp\Model\DomainObject\Product;

use PDO;

class ProductFinder extends AbstractFinder
{
    public function findById(int $id): Product
    {
        // TODO: you can extract the table name in a constant, or a getter function, or config
        $sql = "select * from product where id=?";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //TODO: we are assuming here the property names and column names are the same (adjust if not in your case)
        return $this->translateToUser($row);
    }

    public function findAll() : array
    {
        $sql = "select * from product";
        $statement = $this->getPdo()->prepare($sql);

        $statement->execute();
        $result = array();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $result[] = $this->translateToProduct($row);
        }

        return $result;
    }

    private function translateToProduct(array $row): Product
    {
        $product = new Product($row['user_id'],$row['title'],$row['description'],$row['camera_specs'],null,$row['thumbnail_path'],$row['id']);

        return $product;
    }
}