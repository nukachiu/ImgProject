<?php

namespace MyApplication\Controller;

use MyApplication\Model\DomainObject\Product;
use MyApplication\View\Render\ShowProductRender;

class ProductController
{
    public static function showProducts()
    {
        echo 'asd';
        include 'MyApplication/View/Templates/home-page.php';
        /*$products = [
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier'),
            (new Product())->setTitle('Cand vreau sa fluier fluier')
        ];

        //var_dump($products);
        (new ShowProductRender())->render($products);
        echo 'AJUNG AICI?';*/

    }

    public static function uploadProduct()
    {

    }

    public static function buyProduct()
    {

    }

    public static function uploadProductPost()
    {

    }

    public static function showProduct()
    {

    }
}