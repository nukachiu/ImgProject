<?php
declare(strict_types=1);

namespace MyApp\Model\Persistence\Finder;

use MyApp\Model\DomainObject\User;
use PDO;
use MyApp\Model\Persistence\Finder\NullUserFinder;

class UserFinder extends AbstractFinder
{
    public function findById(int $id): User
    {
        // TODO: you can extract the table name in a constant, or a getter function, or config
        $sql = "select * from user where id=?";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //TODO: we are assuming here the property names and column names are the same (adjust if not in your case)
        return $this->translateToUser($row);
    }

    public function findForLogin(string $email, string $pass): User
    {
        $sql = "select * from user where email=? and password=?";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1,$email,PDO::PARAM_STR);
        $statement->bindValue(2,$pass,PDO::PARAM_STR);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if($row === false)
            return new User(null,null,null);
        return $this->translateToUser($row);

    }

    private function translateToUser(array $row): User
    {
        $user = new User($row['name'], $row['email'], null, $row['id']);

        return $user;
    }
}
