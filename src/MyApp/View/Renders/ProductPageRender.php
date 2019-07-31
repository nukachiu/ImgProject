<?php


namespace MyApp\View\Renders;


class ProductPageRender
{
    public function rend($product)
    {
        require 'src/MyApp/View/Templates/product-page.php';
    }
}