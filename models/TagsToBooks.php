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

    function fetchTagBooks($id)
    {
        $query = "SELECT
        books.id,
        tags.tag AS tag,
        books.book_image,
        books.title,
        books_tags.tag_id tag_id,
        books_tags.book_id book_id
 
    FROM
        books
    JOIN
        books_tags
    ON
        books_tags.book_id = books.id
    JOIN
        tags
    ON
        tags.id = books_tags.tag_id
    WHERE
        books_tags.tag_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
