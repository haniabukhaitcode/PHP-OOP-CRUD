<?php

class Connection
{
    private $info;
    private $connection;

    public function __construct()
    {
        $this->info = require_once("../config/database.php");
    }

    public function getConnection()
    {
        $dsn = $this->info['mysql']['name'] . ':' . 'dbname=' . $this->info['mysql']['dbname'] . ';' . 'host=' . $this->info['mysql']['host'];

        try {
            $this->connection = new PDO($dsn, $this->info['mysql']['username'], $this->info['mysql']['password']);
            return $this->connection;
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
    }
}
