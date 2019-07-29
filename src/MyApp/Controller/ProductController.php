<?php

namespace MyApp\Controller;

use MyApp\Model\DomainObject\Product;
use MyApp\View\Renders\ProductPageRender;
use MyApp\View\Renders\ShowProductRender;
use MyApp\View\Renders\UploadProductRender;

class ProductController
{
    public static function showProducts()
    {
        $products = [
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier')
        ];

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