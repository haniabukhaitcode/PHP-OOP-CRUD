<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTag.php");
class TagsToBooks extends BaseModel
{
    protected $fields = [
        "id",
        "author_id",
        "book_image",
        "title"
    ];
    protected $table = "books";

    function fetchTagBooks($ids)
    {
        if (!is_array($ids)) {
            $ids = array($ids);
        };
        $ids = implode(",", $ids);
        $query = "SELECT * FROM fetchTagBooks WHERE tagID IN ($ids)";
        $result = $this->conn->query($query)->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
