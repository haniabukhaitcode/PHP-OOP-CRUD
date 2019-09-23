<?php

$fields = [];
$table;
$conn;
$data = ["name" => "Hani", "color" => "red", "age" => 12, "book" => "java"];

$arr = [];
foreach ($data as $key => $newKey) {
    $arr[':' . $key] = $newKey;
}
print_r($arr); // [:name] => Hani [:color] => red [:age] => 12 [:book] => java

$dataNew = [":name" => "Hani", ":color" => "red", ":age" => 12, ":book" => "java"];
$keys = implode(',', array_keys($dataNew));
print_r("<br>" . $keys . "<br>"); // :name,:color,:age,:book

$fields = ["name" => "Hani", "color" => "red", "age" => 12, "book" => "java"];

array_shift($fields);
$fields = implode(', ', $fields);
print_r($fields); // red, 12, java
