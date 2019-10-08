<?php

require "../config/connection.php";

class BaseModel
{
    protected $fields = [];
    protected $table;
    protected $conn;
    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->instance;
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

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
        $stmt =  $sql->execute();

        return  $stmt;
    }

    public function fetchRow()
    {
        return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchOne(int $id)
    {
        $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table . " where id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll($row = null)
    {
        if ($row != null) {
            $query = $row;
        } else {
            $query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table;
        }
        $stmt = $this->conn->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $stmt;
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

        $stmt =  $sql->execute();

        return  $stmt;
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
