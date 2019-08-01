<?php

namespace MyApp\Controller;

use MyApp\Model\DomainObject\User;
use MyApp\Model\Persistence\Finder\UserFinder;
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
        unset($_SESSION['name']);
        unset($_SESSION['email']);

        header('Location: /');
    }

    public static function showUploads()
    {

    }

    public static function loginPost()
    {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        /**
         * @var UserFinder $userLogin
         */
        $userLogin = PersistenceFactory::createFinder('user');
        /**
         * @var User $user
         */
        $user = $userLogin->findForLogin($email,$password);
        if($user->isNull()) {
            (new LoginFormRender())->render('Eraore');
            return;
        }

        $_SESSION['name'] = $user->getName();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['id'] = $user->getId();

        header('Location: /');
    }

    public static function isLoggedIn()
    {
        if(isset($_SESSION['name'])){
            return true;
        }
        return false;
    }

    public static function registerPost()
    {
        /**
         * @var UserMapper $userRegister
         */
        $userRegister = PersistenceFactory::createMapper('user');
        $user = UserTransform::arrayToUser($_POST);
        $userRegister->save($user);

        header('Location: /profile');
    }
}