<?php


namespace MyApp\Model\Persistence\Finder;

use MyApp\Model\DomainObject\Tier;
use PDO;

class TierFinder extends AbstractFinder
{
    public function findByProductId($id): Tier
    {
        // TODO: you can extract the table name in a constant, or a getter function, or config
        $sql = "select * from tier where product_id=?";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //TODO: we are assuming here the property names and column names are the same (adjust if not in your case)
        return $this->translateToTier($row);
    }

    private function translateToTier(array $row): Tier
    {
        $tier = new Tier( $row['product_id'],'large',$row['path_with_watermark'],$row['path_without_watermark'],$row['price'],$row['id']);

        return $tier;
    }
}