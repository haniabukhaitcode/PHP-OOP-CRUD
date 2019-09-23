<?php

class Connection
{
    private $info;
    public $instance;
    public function __construct()
    {
        $this->info = require "../config/database.php";
        $this->instance = $this->getConnection();
        return $this->instance;
    }

    public function getConnection()
    {
        $dsn = $this->info['mysql']['name'] . ':' . 'dbname=' . $this->info['mysql']['dbname'] . ';' . 'host=' . $this->info['mysql']['host'];

        try {
            $connection = new PDO($dsn, $this->info['mysql']['username'], $this->info['mysql']['password']);
            return $connection;
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
    }
}
