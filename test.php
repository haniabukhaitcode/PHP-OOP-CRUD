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

function insert(array $data)
{
    array_shift($this->fields);   // [0] => author
    $fields = implode(', ', $this->fields); //author,
    $parameters = $this->arrayValues($data); // {>"author" [":0"]=> NULL [":1"]=> NULL }
    $keys = implode(',', array_keys($parameters));  //"0,1,:0,:1" 
    $sql = $this->conn->getConnection()->prepare("insert into  " . $this->table .  "(' . $fields . ') values(' . $keys . ')");
    $sql->execute($parameters);
    print_r($parameters);
    return true;
}
var_dump($sql);
