<?php


namespace MyApp\Model\FormMappers;

use MyApp\Model\DomainObject\Product;


class ProductTransform
{
    private static function hashArtistName(string $artistName): string {
        return md5($artistName);
    }

    public static function arrayToProduct(array $rowPOST, array $rowFILE): Product
    {
        $artistName = $_SESSION['name'];
        $artistFolder = self::hashArtistName($artistName);
        $path = sprintf("%s/%s",IMAGE_ROOT_FOLDER, $artistFolder);

        return new Product($_SESSION['id'],$rowPOST['imageTitle'],$rowPOST['description'],$rowPOST['cameraSpecs'],$rowPOST['captureDate'],$path);
    }
}