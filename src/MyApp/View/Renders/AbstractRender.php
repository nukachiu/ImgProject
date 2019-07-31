<?php

namespace MyApp\View\Renders;

abstract class AbstractRender
{
    protected function getPage(strinf$pageContent)
    {
        require 'header';
        require $pageContent;
        require  'footer';
    }

    abstract public function render($products);
}