<?php

require "../config/connection.php";

class BaseModel
{
    protected $fields = [];
    protected $table;
    private $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->instance;
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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

        // array_shift($this->fields);
        $insertedKeys = array();
        foreach ($data as $key => $val) {
            $insertedKeys[] = $key;
        }
        $fields = implode(',', $insertedKeys);
        $parameters = $this->arrayKeys($data);
        $keys = implode(',', array_keys($parameters));

        $sql = $this->conn->prepare("insert into  " . $this->table .  "($fields) values($keys)");
        foreach ($data as $key => $val) {
            $sql->bindValue(':' . $key, $val);
        }
        $sql->execute();

        print_r($sql->errorInfo());
        return true;
    }

    // public function fetchById(int $id)
    // {
    //     return $this->conn->getConnection()->query("select " . implode(',', $this->fields) . " from " . $this->table . " where id = " . $id)->fetchAll(PDO::FETCH_OBJ)[0];
    // }


    // fetch select 1
    public function fetchOne($id)
    {
        $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table . " where id = ? ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchRaw($query)
    {
        return $this->conn->query($query)->fetchAll();
    }

    // fetch select many
    public function fetchAll($raw = null)
    {
        if ($raw != null) {
            $query = $raw;
        } else {
            $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table;
        }
        return $this->conn->query($query)->fetchAll(PDO::FETCH_OBJ);
    }
}
