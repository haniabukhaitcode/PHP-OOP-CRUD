<?php

require_once("../config/connection.php");

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
        $arr = [];
        foreach ($data as $key => $value) {
            $arr[':' . $key] = $value;
        }
        return $arr;
    }

    // fetch select
    public function fetch()
    {
        $sql = $this->conn->getConnection()->query("SELECT " . implode(',', $this->fields) . " FROM " . $this->table)->fetchAll(PDO::FETCH_OBJ);
        return $sql;
    }

    public function fetchById(int $id)
    {
        return $this->conn->getConnection()->query("select " . implode(',', $this->fields) . " from " . $this->table . " where id = " . $id)->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public function insert(array $data)
    {
        array_shift($this->fields);   // [0] => author

        $fields = implode(', ', $this->fields); //author,

        $parameters = $this->arrayValues($data); // { [0]=>"id" [1]=>"author" [":0"]=> NULL [":1"]=> NULL }

        $keys = implode(',', array_keys($parameters));  //"0,1,:0,:1" 

        $sql = $this->conn->getConnection()->prepare("insert into  " . $this->table .  "(' . $fields . ') values(' . $keys . ')");
        $sql->execute($parameters);
        return true;
    }

    public function update(int $id, array $data)
    {
        $stmt = '';
        foreach ($data as $key => $value) {
            $stmt .= $key . "='" . $value . "',";
        }
        $stmt = rtrim($stmt, ',');
        $sql = $this->conn->getConnection()->prepare('update ' . $this->table . ' set ' . $stmt . ' where ' . $this->primary_key . ' = ' . $id);
        $sql->execute();
        return true;
    }

    public function delete(int $id)
    {
        return $this->conn->getConnection()->exec('delete from ' . $this->table . ' where ' . $this->primary_key . ' = ' . $id);
    }
}
