<?php

namespace MyApp\View\Renders;

class ShowProductRender
{
    public function render(array $products)
    {
        require 'src/MyApp/View/Templates/home-page.php';
    }
}