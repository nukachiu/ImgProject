<?php
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

//$test  = PersistenceFactory::createFinder('User');
//var_dump($test->findById(1));

///** @var UserMapper $test2 */
//$test2 = PersistenceFactory::createMapper('user');
//$test2->save($pers);

///** @var ProductFinder $test3 */
//$test3 = PersistenceFactory::createFinder('product');
//var_dump($test3->findById(2));

//$prod = new Product(2,'Apus','Pretty', '10x10',null,'qweqwe/ewqewq');
//$test4 = PersistenceFactory::createMapper('product');
///** @var ProductMapper $test4 */
//$test4->save($prod);