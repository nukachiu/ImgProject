<?php


namespace MyApplication\Controller;


class UserController
{
    public static function login()
    {
        require 'src/MyApp/View/Templates/login-form.php';
    }

    public static function register()
    {
        require 'src/MyApp/View/Templates/register-form.php';
    }

    public static function logout()
    {

    }

    public static function showUploads()
    {

    }

    public static function loginPost()
    {

    }

    public static function registerPost()
    {

    }
}