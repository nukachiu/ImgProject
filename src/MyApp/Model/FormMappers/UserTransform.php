<?php

namespace MyApp\Model\FormMappers;

use MyApp\Model\DomainObject\User;


class UserTransform
{
    public static function arrayToUser(array $row): User
    {
        return new User($row['name'], $row['email'], $row['password']);
    }
}