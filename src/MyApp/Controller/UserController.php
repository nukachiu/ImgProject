<?php


namespace MyApp\Controller;

use MyApp\Model\DomainObject\User;
use MyApp\View\Renders\LoginFormRender;
use MyApp\View\Renders\ProfileRender;
use MyApp\View\Renders\RegisterRender;
use MyApp\Model\Persistence\Mapper\UserMapper;
use MyApp\Model\Persistence\PersistenceFactory;
use MyApp\Model\FormMappers\UserTransform;

class UserController
{
    public static function login()
    {
        (new LoginFormRender())->render();
    }

    public static function register()
    {
        (new RegisterRender())->render();
    }

    public static function showProfile()
    {
        (new ProfileRender())->rend();
    }

    public static function logout()
    {

    }

    public static function showUploads()
    {

    }
    //aici voi face si redirect castre pagina corecta
    public static function loginPost()
    {
        echo "SUNT IN LOGIN POST".'<br/>';
        echo 'Aici vor fi validari si etc'.PHP_EOL;

        header('Location: /');
    }

    public static function registerPost()
    {
        echo 'SUNT IN REGISTER POST';
        /**
         * @var UserMapper $a
         */
        $a = PersistenceFactory::createMapper('user');
        $user = UserTransform::arrayToUser($_POST);
        $a->save($user);

        header('Location: /profile');

    }
}