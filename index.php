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
use MyApp\Model\DomainObject\Tier;
use MyApp\Model\Persistence\Mapper\TierMapper;

$router = new \MyApp\Controller\Router();
include 'src/MyApp/View/Templates/menu.php';
$router->match($_SERVER['REQUEST_URI']);