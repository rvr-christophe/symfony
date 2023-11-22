<?php

namespace App\Entity;

Class User {
    protected $name;
    protected $email;

    public function getName() 
    {
        return $this->name;
    }
    public function getEmail() 
    {
        return $this->email;
    }
    public function setName ($name)
    {
        $this->name = $name;
    }
    public function setEmail ($email)
    {
        $this->email = $email;
    }

}