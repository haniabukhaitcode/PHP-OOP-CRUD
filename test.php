<?php
$data = [
    "title" => ["title"],
    "author_id" => ["author_id"],
    "tags" => ["tags"],
    "image" => ["book_image"]

];
$table = "books";
$arr = [];
foreach ($data as $key => $newKey) {
    $arr[':' . $key] = $newKey;
}

print_r($arr);
//([:title] => Array ( [0] => title ) [:author_id] => Array ( [0] => author_id ) [:tags] => Array ( [0] => tags ) [:image] => Array ( [0] => book_image ) )

$insertedKeys = array();
foreach ($data as $key => $val) {
    $insertedKeys[] = $key;
}
$fields = implode(',', $insertedKeys);
print_r("<br>" . $fields . "<br>"); //title,author_id,tags,image


$arrKey =  [":title" => "val", ":author_id" => "val",  ":tags" => "val", ":image" => "val"];
$keys = implode(',', array_keys($arrKey));
print_r($keys . "<br>"); // :title,:author_id,:tags,:image


$stmt = "insert into  " . $table .  " ($fields) values($keys)";

print_r($stmt);
