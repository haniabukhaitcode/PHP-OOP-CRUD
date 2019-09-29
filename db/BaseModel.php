<?php

require "../config/connection.php";

class BaseModel
{
    protected $fields = [];
    protected $table;
    private $conn;
    protected $primary_key = 'id';
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


    public function fetchOne(int $id)
    {

        $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table . " where id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchRaw()

    {
        return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetchAll();
    }

    public function getById(int $id)
    {
        return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table . " where id = " . $id)->fetchAll(PDO::FETCH_OBJ)[0];
    }


    public function fetchAll($row = null)
    {
        if ($row != null) {
            $query = $row;
        } else {
            $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table;
        }
        return $this->conn->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function test(array $data)
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

    public function update(int $id, array $data)
    {
        $stmt = '';
        foreach ($data as $key => $value) {
            $stmt .= $key . "=:" . $value . ",";
        }
        $stmt = rtrim($stmt, ',');
        $sql = $this->conn->prepare('update ' . $this->table . ' set ' . $stmt . ' where ' . $this->primary_key . ' = ' . $id);
        $sql->execute();
        return true;
    }


    public function delete(int $id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE " . $this->primary_key . " = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }
}
