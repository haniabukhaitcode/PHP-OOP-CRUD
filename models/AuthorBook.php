<?php
require "../db/BaseModel.php";

class AuthorBook extends BaseModel
{
    protected $fields = [
        "id",
        "author"

    ];
    // we are receiving title, author_id, tags, image
    // our table "books" should receive lastId inserted id, title, author_id, book_image
    protected $table = "books";

    function fetchAuthorBooks($id)
    {

        $query = "SELECT
        books.id,
        books.title,
        books.book_image,
        books.author_id,
        authors.author author,
   
    FROM
        books
    JOIN
        authors
    ON
    authors.id = books.author_id
    WHERE
        books.author_id = ?";

        $this->fetchOne($id, $query);
    }
}
