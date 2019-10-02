<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTags.php");
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
        $query = "SELECT
        books.id,
        books.author_id,
        books.title,
        books.book_image,
        authors.author author
    FROM
        books
    JOIN
        authors
    ON
    authors.id = books.author_id
    WHERE
        books.author_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
