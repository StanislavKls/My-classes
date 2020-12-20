<?php
namespace App;

class User
{
    private $address;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addAddress(Address $address)
    {
        $this->address[] = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getName()
    {
        return $this->name;
    }
    public function compareTo($user2)
    {
        return $this->name === $user2->name;
    }
}