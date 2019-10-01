<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTags.php");
class AuthorBook extends BaseModel
{
    protected $fields = [
        "id",
        "author_id",
        "title",
        "book_image"

    ];
    protected $table = "books";

    // function fetchAuthorBooks()
    // {
    //     $query = "SELECT 
    //     books.id,
    //     books.title,
    //     books.book_image,
    //     books.author_id,
    //     authors.author author
    //     FROM
    //         books
    //     LEFT JOIN
    //         authors
    //     ON
    //         authors.id = books.author_id   
    //     GROUP BY
    //         books.id";
    //     $result = $this->fetchAll($query);
    //     return $result;
    // }
}
