<?php
$arr = [
    'id' =>
    [
        "title" => ["title"],
        "author_id" => ["author_id"],
        "tags" => ["tags"],
        "image" => ["book_image"],
    ]
];


$table = 'books';
$primary_key = 'id';
$id = 1;
$data = [
    "title" => "myTitle",
    "author" => "myAuthor",
    "tags" => "myTags",
    "image" => "myImage"
];
$fields = [
    "title" => "myTitle",
    "author" => "myAuthor",
    "tags" => "myTags",
    "image" => "myImage"
];

$statement = '';
foreach ($data as $key => $value) {
    $statement .= $key . "='" . $value . "',";
}
print_r($statement . "<br>"); // title='myTitle',author='myAuthor',tags='myTags',image='myImage',
$statement = rtrim($statement, ',');
print_r($statement . "<br>"); //title='myTitle',author='myAuthor',tags='myTags',image='myImage'

$sql = ('update ' . $table . ' set ' . $statement . ' where ' . $primary_key . ' = ' . $id);
print_r($sql . "<br>"); // update books set title='myTitle',author='myAuthor',tags='myTags',image='myImage' where id = 1

$query = "SELECT " . implode(',', $fields) . " FROM " . $table . " where id = 1 ";
print_r($query); // update books set title='myTitle',author='myAuthor',tags='myTags',image='myImage' where id = 1
