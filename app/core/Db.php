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
        $this->createTableDoors();
    }

    public function createTableDoors()
    {
        $doors = 'doors';
        try {
            $tables = $this->db->query("SHOW TABLES FROM $this->dbname")->fetchAll(\PDO::FETCH_COLUMN);
            if (!in_array($doors, $tables)) {
                $this->db->exec("
                CREATE TABLE `doors` (
                    id integer auto_increment primary key,
                    color varchar(30),
                    skin_color varchar(30),
                    handle_color varchar(30),
                    width smallint(30),
                    height smallint(30),
                    opening varchar(30),
                    accessories varchar(30)
                    );
                ");
            }
        } catch (\PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    public function add($sql) {
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }

    public function get($sql)
    {
        return $this->db->query($sql);
    }
}