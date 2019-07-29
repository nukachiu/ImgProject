<?php

namespace MyApplication\View\Render;

class ShowProductRender
{
    public function render(array $products)
    {
        echo "AM REUSIT";
        require 'MyApplication/View/Templates/home-page.php';
    }
}