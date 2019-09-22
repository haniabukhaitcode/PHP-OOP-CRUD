<?php

require "../models/Model.php";

class Book extends Model
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

class Author extends Model
{
    protected $fields = [
        "id",
        "author"
    ];

    protected $table = 'authors';
}
class Tag extends Model
{
    protected $fields = [
        "id",
        "tag"
    ];

    protected $table = 'tags';
}
class AuthorBooks extends Model
{
    protected $fields = [
        "books.id",
        "books.author_id",
        "books.title",
        "books.book_image",
        "authors.author author"
    ];

    protected $table = "books
    JOIN
        authors
    ON
    authors.id = books.author_id
    WHERE
        books.author_id = ?";
}
