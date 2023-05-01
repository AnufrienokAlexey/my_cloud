<?php

namespace app\models;

use app\core\Model;

class Account extends Model
{
    public function getUsers()
    {
        return $this->db->get("SELECT * FROM users");
    }

    public function addUser($email, $password)
    {
        $this->db->add("INSERT INTO users(`id`, `email`, `password`) VALUES (null , '$email', '$password')");
    }

    public function getEmail($email)
    {
        return $this->db->get("SELECT * FROM users WHERE `email` = '$email'");
    }
}