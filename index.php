<?php
require_once 'vendor/autoload.php';
include 'constants.php';

use MyApplication\Controller\ProductController;
const URL_MAP=[
    '/' => "MyApp\Controller\ProductController::showProducts",
    '/login'=>"MyApp\Controller\UserController::login",
    '/loginPost'=>"MyApp\Controller\UserController::loginPost",
    '/register'=>"MyApp\Controller\UserController::register",
    '/registerPost'=>"MyApp\Controller\UserController::registerPost",
    '/profile'=>"MyApp\Controller\UserController::showProfile",
    '/upload'=>"MyApp\Controller\ProductController::uploadProduct",
    '/product'=>"MyApp\Controller\ProductController::showProducts",
];

$url = $_SERVER['REQUEST_URI'];

call_user_func(URL_MAP[$url]);


