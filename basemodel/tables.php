<?php

require_once("../basemodel/basemodel.php");

class Book extends BaseModel
{
    protected $fields = [
        "books.id",
        "books.title",
        "books.book_image",
        "authors.author",
        "authors.id AS author_id",
        "GROUP_CONCAT(tags.tag SEPARATOR ',') tags"
    ];

    protected $table = "books
    LEFT JOIN
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
    GROUP BY
        books.id";
}

class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"
    ];

    protected $table = 'authors';
}
class Tag extends BaseModel
{
    protected $fields = [
        "id",
        "tag"
    ];

    protected $table = 'tags';
}
