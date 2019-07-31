<?php

namespace MyApp\Controller;

use MyApp\Model\DomainObject\Product;
use MyApp\Model\Persistence\Mapper\ProductMapper;
use MyApp\View\Renders\ProductPageRender;
use MyApp\View\Renders\ShowProductRender;
use MyApp\View\Renders\UploadProductRender;
use MyApp\Model\Persistence\PersistenceFactory;
use MyApp\Model\Persistence\Finder\ProductFinder;
use MyApp\Model\FormMappers\ProductTransform;

//session_start();

class ProductController
{
    public static function showProducts()
    {
        /**
         * @var ProductFinder $productFinder
         */
        $productFinder = PersistenceFactory::createFinder('product');
        $products = $productFinder->findAll();
        (new ShowProductRender())->render($products);

    }

    public static function uploadProduct()
    {
        (new UploadProductRender())->rend();
    }

    public static function buyProduct()
    {
        //Get the product id
        $id = (explode('/',$_SERVER['REQUEST_URI']))[2];


        $finderProduct = PersistenceFactory::createFinder('product');
        /**
         * @val ProductFinder $finderProduct
         */
        (new ProductPageRender())->rend($finderProduct->findById($id));
    }

    public static function uploadProductPost()
    {
        $product = ProductTransform::arrayToProduct($_POST,$_FILES);
        var_dump($_FILES);
        var_dump($product);

        if(!file_exists($product->getThumbnailPath())){
            mkdir($product->getThumbnailPath());
        }
        move_uploaded_file($_FILES['image1']['tmp_name'],$product->getThumbnailPath().'/'.$product->getTitle());

        $uploadImage = PersistenceFactory::createMapper('product');
        /**
         * @var ProductMapper $uploadImage
         */
        $uploadImage->save($product);
    }

    public static function showProduct()
    {

    }
}