<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTag.php");
class TagsToBooks extends BaseModel
{
    protected $fields = [
        "id",
        "title",
        "book_image",
        "author_id"
    ];
    protected $table = "books";

    public function fetchTagBooks($id)
    {
        $query =
            "SELECT 
            books.id,
            books.title,
            books.book_image,
            authors.author,
            tags.id tag_id,
            GROUP_CONCAT(tags.tag SEPARATOR ',') tag
        FROM
            books
        JOIN
            authors
        ON
            authors.id = books.author_id
        LEFT JOIN
            books_tags
        ON
            books_tags.book_id = books.id
        LEFT JOIN
            tags
        ON
            tags.id = books_tags.tag_id
        WHERE
            books_tags.tag_id = ?
        GROUP BY
            books.id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
