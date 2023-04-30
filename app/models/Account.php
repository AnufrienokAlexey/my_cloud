<?php

namespace app\models;

use app\core\Model;

class Account extends Model
{
    public function getUsers()
    {
        return $this->db->get("SELECT * FROM users");
    }
}