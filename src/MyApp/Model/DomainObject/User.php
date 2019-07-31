<?php

namespace MyApp\Model\DomainObject;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $password
     * @param $id
     */
    public function __construct($name, $email, $password, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    private function getOrders(){

        return 1;
    }

    private function getProducts(){

        return 1;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function isNull():bool
    {
        if(null === $this->getEmail() && null === $this->getName())
            return true;
        return false;
    }
}