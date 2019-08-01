<?php


namespace MyApp\Controller;


class Router
{

    const URL_MAP=[
        '' => "MyApp\Controller\ProductController::showProducts",
        'login'=>"MyApp\Controller\UserController::login",
        'logout'=>"MyApp\Controller\UserController::logout",
        'loginPost'=>"MyApp\Controller\UserController::loginPost",
        'register'=>"MyApp\Controller\UserController::register",
        'registerPost'=>"MyApp\Controller\UserController::registerPost",
        'profile'=>"MyApp\Controller\UserController::showProfile",
        'upload'=>"MyApp\Controller\ProductController::uploadProduct",
        'uploadPost'=>"MyApp\Controller\ProductController::uploadProductPost",
        'product'=>"MyApp\Controller\ProductController::showProduct",
        'buyProduct'=>"MyApp\Controller\ProductController::buyProduct",
    ];

    public function match(string $url)
    {
        $urlParts=explode('/',$url);
        $controllerAction = self::URL_MAP[$urlParts[1]];

        $args = [];

        if(isset($urlParts[2]) && !empty($urlParts[2])){
            $id = (int) $urlParts[2];
            $args = $id;
        }

        return call_user_func_array($controllerAction, [$args]);
    }

//    $url = $_SERVER['REQUEST_URI'];
//
//    include 'src/MyApp/View/Templates/menu.php';
//
//    call_user_func(URL_MAP[$url]);
}