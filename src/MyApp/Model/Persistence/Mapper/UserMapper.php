<?php
declare(strict_types=1);

namespace MyApp\Model\Persistence\Mapper;

use MyApp\Model\DomainObject\User;

use PDO;

class UserMapper extends AbstractMapper
{
    public function save(User $user): void
    {
        if (null === $user->getId()) {
            $this->insert($user);
            return;
        }
        $this->update($user);
    }

    private function insert(User $user)
    {
        //TODO: transform user to array row then prepare an INSERT ($this->getPdo()) and execute
        $row = $this->translateToArray($user);
        $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
        $statement = $this->getPdo()->prepare($sql);
        // ... bind parameters from $row
        $statement->bindValue(1,$row['name'], PDO::PARAM_STR);
        $statement->bindValue(2,$row['email'], PDO::PARAM_STR);
        $statement->bindValue(3,$row['password'],PDO::PARAM_STR);

        $statement->execute();

    }

    private function update(User $user)
    {
        //var_dump("update!!");
        //TODO: transform user to array row then prepare an UPDATE ($this->getPdo()) and execute
        $row = $this->translateToArray($user);
        $sql = "";
        $statement = $this->getPdo()->prepare($sql);
        // ... bind parameters from $row
        $statement->execute();
    }

    private function translateToArray(User $user): array
    {
        // TODO: you may extract this array to a constant in this class, the app config, or you can use reflection
        // to obtain all the properties of user dynamically then by convention obtain the columns to map to (next level)
        $row = [
            'id'    => $user->getId(),
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
            // TODO: handle the rest of fields
        ];

        // write password only when is set/user is a new entity (on load it is never read into the property)
        if ($user->getPassword() !== null) {
            //$row['password'] = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $row['password'] = $user->getPassword();
        }

        return $row;
    }
}
