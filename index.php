<?php
require_once 'vendor/autoload.php';
include 'constants.php';

use MyApplication\Controller\ProductController;
const URL_MAP=[
    '/' => "MyApplication\Controller\ProductController::showProducts",
    '/login'=>"MyApplication\Controller\UserController::login",
    '/register'=>"MyApplication\Controller\UserController::register",
    '/profile'=>"MyApplication\Controller\UserController::showProfile",
    '/upload'=>"MyApplication\Controller\UserController::upload",
    '/product'=>"MyApplication\Controller\ProductController::showProducts",
];

$url = $_SERVER['REQUEST_URI'];

call_user_func(URL_MAP[$url]);


