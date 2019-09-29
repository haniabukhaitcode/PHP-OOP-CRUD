<?php
require_once "../db/BaseModel.php";

class AuthorBook extends BaseModel
{
    protected $fields = [
        "id",
        "title",
        "book_image",
        "author_id"
    ];

    protected $table = "books";

    function fetchAuthorBooks()
    {
        $query = "SELECT
        books.id,
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
        books.author_id";
    }
}
