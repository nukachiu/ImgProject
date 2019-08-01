<?php


namespace MyApp\View\Renders;


class ProductPageRender
{
    public function rend($product, $tier)
    {
        require 'src/MyApp/View/Templates/product-page.php';
    }
}