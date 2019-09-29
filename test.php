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
    "id" => 1,
    "author" => "author 6"
];

$where = [
    "id" => 1,
];


$stmt = '';



foreach ($data as $key => $value) {
    $stmt .= $key . " = :" . $value . " , ";
}


$wstmt = '';
foreach ($where as $key => $value) {
    $wstmt .= $key . " = " . $value;
}
$stmt = rtrim($stmt, ' , ');
$sql = ('update ' . $table . ' set ' . $stmt . ' where ' . $wstmt);

print_r($sql . "<br>"); // update books set title='myTitle',author='myAuthor',tags='myTags',image='myImage' where id = 1

// $query = "SELECT " . implode(',', $fields) . " FROM " . $table . " where id = 1 ";
// print_r($query); // update books set title='myTitle',author='myAuthor',tags='myTags',image='myImage' where id = 1
