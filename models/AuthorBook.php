<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTag.php");
class AuthorBook extends BaseModel
{
    protected $fields = [
        "id",
        "author_id",
        "book_image",
        "title"
    ];
    protected $table = "books";

    function fetchAuthorBooks($id)
    {
        $query = "SELECT * FROM fetchAuthorBooks WHERE author_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
