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
        
       
        if(!is_array($ids)){
            $ids = array($ids);
        };
        $ids = implode(",",$ids);
        $query = "SELECT
        books.id,
        GROUP_CONCAT(tags.tag SEPARATOR ',') tags,
        books.book_image,
        books.title,
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
        books_tags.tag_id IN ($ids)
    GROUP BY 
        books.id
    ";
        $result = $this->conn->query($query)->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
