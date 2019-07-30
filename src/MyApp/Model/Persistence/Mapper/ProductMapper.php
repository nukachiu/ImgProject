<?php


namespace MyApp\Model\Persistence\Mapper;

use MyApp\Model\DomainObject\Product;

use PDO;

class ProductMapper extends AbstractMapper
{
    public function save(Product $product): void
    {
        if (null === $product->getId()) {
            $this->insert($product);
            return;
        }
        $this->update($product);
    }

    private function insert(Product $product)
    {
        //TODO: transform Product to array row then prepare an INSERT ($this->getPdo()) and execute
        $row = $this->translateToArray($product);
        $sql = "INSERT INTO product (title, description, camera_specs,capture_date,thumbnail_path, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue(1,$row['title'], PDO::PARAM_STR);
        $statement->bindValue(2,$row['description'], PDO::PARAM_STR);
        $statement->bindValue(3,$row['cameraSpecs'],PDO::PARAM_STR);
        $statement->bindValue(4,$row['captureDate'],PDO::PARAM_STR);
        $statement->bindValue(5,$row['thumbnailPath'],PDO::PARAM_STR);
        $statement->bindValue(6,$row['userId'],PDO::PARAM_INT);

        var_dump($statement->execute());
        var_dump($statement->errorInfo());

    }

    private function update(Product $product)
    {
        //var_dump("update!!");
        //TODO: transform Product to array row then prepare an UPDATE ($this->getPdo()) and execute
        $row = $this->translateToArray($product);
        $sql = "";
        $statement = $this->getPdo()->prepare($sql);
        // ... bind parameters from $row
        $statement->execute();
    }

    private function translateToArray(Product $product): array
    {
        // TODO: you may extract this array to a constant in this class, the app config, or you can use reflection
        // to obtain all the properties of Product dynamically then by convention obtain the columns to map to (next level)
        $row = [
            'id'    => $product->getId(),
            'title'  => $product->getTitle(),
            'description' => $product->getDescription(),
            'cameraSpecs' => $product->getCameraSpecs(),
            'captureDate' => $product->getCaptureDate(),
            'thumbnailPath' => $product->getThumbnailPath(),
            'userId' => $product->getUserId(),
            // TODO: handle the rest of fields
        ];

        return $row;
    }
}