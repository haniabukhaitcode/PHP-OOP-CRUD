<?php

require "../config/connection.php";

class Model
{
    protected $fields = [];
    protected $table;
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    // we get the values from the array
    public function arrayKeys(array $data)
    {
        $arr = [];
        foreach ($data as $key => $newKey) {
            $arr[':' . $key] = $newKey;
        }
        return $arr;
    }

    public function insert(array $data)
    {
        array_shift($this->fields);
        $fields = implode(', ', $this->fields);
        $parameters = $this->arrayKeys($data);
        $keys = implode(',', array_keys($parameters));
        $sql = $this->conn->getConnection()->prepare("insert into  " . $this->table .  "(' . $fields . ') values(' . $keys . ')");
        $sql->execute($parameters);
        print_r($parameters);
        return true;
    }

    // fetch select
    public function fetch()
    {
        return $this->conn->getConnection()->query("SELECT " . implode(',', $this->fields) . " FROM " . $this->table)->fetchAll(PDO::FETCH_OBJ);
    }
}
