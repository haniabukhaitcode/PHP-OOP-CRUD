<?php

$fields = [
    "books.id",
    "books.title",
    "books.book_image",
    "authors.author",
    "authors.id",
    "GROUP_CONCAT(tags.tag SEPARATOR ',') tags"
];
$table = "books
    Left  JOIN
          authors
      ON
          authors.id = books.author_id
    Left  JOIN
          books_tags
      ON
          books_tags.book_id = books.id
     Left JOIN
          tags
      ON
          tags.id = books_tags.tag_id
  
      GROUP BY
          books.id";

$sql = ("select " . implode(',', $fields) . " from " . $table);

var_dump($sql); // array(2) { [0]=> string(2) "id" [1]=> string(6) "author" }
