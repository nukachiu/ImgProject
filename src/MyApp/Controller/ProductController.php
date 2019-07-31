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
        (new ProductPageRender())->rend();
    }

    public static function uploadProductPost()
    {
        echo 'AICI MA DUCE FORMULARUL';

//        if(!file_exists('/uploads/'.$artistFolder)) {
//            mkdir('uploads/' . $artistFolder);
//        }
//        if(move_uploaded_file($_FILES['image1']['tmp_name'],$path.'/'.$_FILES['image1']['name']) === false){
//            $errors[IMAGE] = 'There was a problem while uploading the photo';
//        }

        $product = ProductTransform::arrayToProduct($_POST,$_FILES);
        var_dump($_FILES);
        var_dump($product);

        if(!file_exists($product->getThumbnailPath())){
            mkdir($product->getThumbnailPath());
        }
        move_uploaded_file($product->getTitle(),$product->getThumbnailPath().'/'.$product->getTitle());


        //Pt baza de date
        //$uploadImage = PersistenceFactory::createMapper('product');
        //        /**
        //         * @var ProductMapper $uploadImage
        //         */
        //$uploadImage->save($product);
    }

    public static function showProduct()
    {

    }
}