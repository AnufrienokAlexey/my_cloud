<?php

namespace app\core;

class Db
{
    protected \PDO $db;
    protected string $dbname;

    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->dbname = $config['dbname'];
        $this->db = new \PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
        $this->createTableUsers();
    }

    public function createTableUsers(): void
    {
        try {
            $tables = $this->db->query("SHOW TABLES FROM $this->dbname")->fetchAll(\PDO::FETCH_COLUMN);
            if (!in_array('users', $tables)) {
                $this->db->exec("
                CREATE TABLE `users` (
                    id integer auto_increment primary key,
                    email varchar(256),
                    password varchar(256)                    
                    );
                ");
            }
        } catch (\PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    public function add($sql)
    {
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }

    public function get($sql)
    {
        return $this->db->query($sql)->fetchAll(2);
    }


}