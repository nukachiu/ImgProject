<?php

namespace MyApp\Controller;

use MyApp\Model\DomainObject\Product;
use MyApp\View\Renders\ProductPageRender;
use MyApp\View\Renders\ShowProductRender;
use MyApp\View\Renders\UploadProductRender;
use MyApp\Model\Persistence\PersistenceFactory;
use MyApp\Model\Persistence\Finder\ProductFinder;


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

    }

    public static function showProduct()
    {

    }
}