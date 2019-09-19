<?php

require_once __DIR__ . "/../config/connection.php";

class BaseModel
{
    protected $fields = [];
    protected $table;
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }


    // we get the values from the array
    public function arrayValues(array $data)
    {
        $keys = [];
        foreach ($data as $key => $value) {
            $keys[':' . $key] = $value;
        }
        return $keys;
    }

    // fetch select
    public function fetch()
    {
        // "select (all the fields in the array and separate them with commas) from (sql table name)"
        return $this->conn->getConnection()->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(array $data)
    {
        array_shift($this->fields);
        $fields = implode(', ', $this->fields);
        $parameters = $this->arrayValues($data);
        $keys = implode(',', array_keys($parameters));
        $sql = $this->conn->getConnection()->prepare('insert into ' . $this->table . ' (' . $fields . ') values(' . $keys . ')');
        $sql->execute($parameters);
        return true;
    }
}
