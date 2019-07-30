<?php

namespace MyApp\View\Renders;

class ShowProductRender
{
    public function render($products)
    {
        require 'src/MyApp/View/Templates/home-page.php';
    }
}