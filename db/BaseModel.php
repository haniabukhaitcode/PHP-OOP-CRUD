<?php

require "../config/connection.php";

class BaseModel
{
    protected $fields = [];
    protected $table;
    protected $conn;
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

        $sql = $this->conn->prepare("insert into  " . $this->table .  " ($fields) values($keys)");
        foreach ($data as $key => $val) {
            $sql->bindValue(':' . $key, $val);
        }
        $sql->execute();

        return $sql;
    }


    public function fetchOne(int $id)
    {
        $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table . " where id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchRow()

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


    public function update(array $data, array $where)
    {
        $stmt = '';
        foreach ($data as $key => $value) {
            $stmt .= $key . " = :" . $key . " , ";
        }

        $wstmt = '';
        foreach ($where as $key => $value) {
            $wstmt .= $key . " = " . $value;
        }

        $stmt = rtrim($stmt, ' , ');

        $sql = $this->conn->prepare('update ' . $this->table . ' set ' . $stmt . ' where ' . $wstmt);
        foreach ($data as $key => $val) {
            $sql->bindValue(':' . $key, $val);
        }

        return $sql->execute();
    }

    public function delete(array $where)
    {
        $wstmt = '';

        foreach ($where as $key => $value) {
            $wstmt .= $key . " = " . $value;
        }

        $query = "DELETE FROM " . $this->table . " WHERE " .  $wstmt;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $wstmt);
        $stmt->execute();
        if ($stmt) {
            header("Location: index.php");
        }
    }
}
