<?php


namespace MyApp\View\Renders;


class LoginFormRender
{
    public static function render($errors=null)
    {
        require 'src/MyApp/View/Templates/login-form.php';
    }
}