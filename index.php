<?php
session_start();

require_once 'vendor/autoload.php';
include 'constants.php';
$config = include 'config.php';

use MyApp\Controller\ProductController;
use MyApp\Model\Persistence\Finder\UserFinder;
use MyApp\Model\Persistence\Mapper\UserMapper;
use MyApp\Model\Persistence\Mapper\ProductMapper;
use MyApp\Model\Persistence\PersistenceFactory;
use MyApp\Model\DomainObject\User;
use MyApp\Model\DomainObject\Product;
use MyApp\Model\Persistence\Finder\ProductFinder;

$router = new \MyApp\Controller\Router();
include 'src/MyApp/View/Templates/menu.php';
$router->match($_SERVER['REQUEST_URI']);

/*const URL_MAP=[
    '/' => "MyApp\Controller\ProductController::showProducts",
    '/login'=>"MyApp\Controller\UserController::login",
    '/logout'=>"MyApp\Controller\UserController::logout",
    '/loginPost'=>"MyApp\Controller\UserController::loginPost",
    '/register'=>"MyApp\Controller\UserController::register",
    '/registerPost'=>"MyApp\Controller\UserController::registerPost",
    '/profile'=>"MyApp\Controller\UserController::showProfile",
    '/upload'=>"MyApp\Controller\ProductController::uploadProduct",
    '/uploadPost'=>"MyApp\Controller\ProductController::uploadProductPost",
    '/product'=>"MyApp\Controller\ProductController::buyProduct",
];

$url = $_SERVER['REQUEST_URI'];

include 'src/MyApp/View/Templates/menu.php';

call_user_func(URL_MAP[$url]);*/