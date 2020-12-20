<?php
namespace App;

class Address
{
    private $country;
    private $city;
    private $street;

    public function __construct($country, $city, $street)
    {
        $this->country = $country;
        $this->city    = $city;
        $this->street  = $street;
    }

    public function getCountry()
    {
        return $this->country;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getStreet()
    {
        return $this->street;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function setCity($city)
    {
        $this->country = $city;
    }
    public function setStreet($street)
    {
        $this->country = $street;
    }
}