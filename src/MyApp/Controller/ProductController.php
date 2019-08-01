<?php

namespace MyApp\Controller;

use MyApp\Model\DomainObject\Tier;
use MyApp\Model\Persistence\Finder\TierFinder;
use MyApp\Model\Persistence\Mapper\ProductMapper;
use MyApp\View\Renders\ProductPageRender;
use MyApp\View\Renders\ShowProductRender;
use MyApp\View\Renders\UploadProductRender;
use MyApp\Model\Persistence\PersistenceFactory;
use MyApp\Model\Persistence\Finder\ProductFinder;
use MyApp\Model\FormMappers\ProductTransform;
use MyApp\Model\Persistence\Mapper\TierMapper;
use MyApp\Model\Persistence\Mapper\OrderItemMapper;

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
        $orderItemMapper = PersistenceFactory::createMapper('OrderItem');
        $id = (explode('/',$_SERVER['REQUEST_URI']))[2];
        //echo $id;
        /**
         * @var OrderItemMapper $orderItemMapper
         */
        $orderItemMapper->insert($id,$_SESSION['id']);

        header('Location: /');

    }

    public static function uploadProductPost()
    {
        $product = ProductTransform::arrayToProduct($_POST,$_FILES);

        $imagePath = $product->getThumbnailPath().'/'.$product->getTitle();
        if(!file_exists($product->getThumbnailPath())){
            mkdir($product->getThumbnailPath());
        }
        move_uploaded_file($_FILES['image1']['tmp_name'],$imagePath);

        $uploadImage = PersistenceFactory::createMapper('product');
        /**
         * @var ProductMapper $uploadImage
         */
        $lastId =  $uploadImage->save($product);

        $tier = new Tier($lastId,'large',$imagePath,$imagePath, $_POST['price']);

        $uploadTier = PersistenceFactory::createMapper('tier');
        /**
         * @var TierMapper $uploadTier
         */

        $uploadTier->insert($tier);

        header('Location: /');
    }

    public static function showProduct()
    {
        //Get the product id
        $id = (explode('/',$_SERVER['REQUEST_URI']))[2];

        /**
         * @var ProductFinder $finderProduct
         * @var TierFinder $finderTier
         */

        $finderProduct = PersistenceFactory::createFinder('product');
        $finderTier = PersistenceFactory::createFinder('tier');

        (new ProductPageRender())->rend($finderProduct->findById($id),$finderTier->findByProductId($id));
    }
}