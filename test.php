<?php

$fields = ['id', 'author'];
echo "<br>Fields</br>";
var_dump($fields); // array(2) { [0]=> string(2) "id" [1]=> string(6) "author" }

foreach ($fields as $key => $val) {
    $fields[':' . $key] = $value;
}

echo "<br>Fields Keys foreach()</br>";
var_dump($fields); //array(4) { [0]=>"id" [1]=>"author" [":0"]=> NULL [":1"]=> NULL }

$newFields = ['id', 'author'];

foreach ($newFields as $key => $val) {
    $newFields[':' . $key] = $value;
}

echo "<br>foreach newFields</br>";
var_dump($newFields); //array(4) { [0]=>"id" [1]=>"author" [":0"]=> NULL [":1"]=> NULL }
print_r($newFields); //Array ( [0] => id [1] => author [:0] => [:1] => )

echo "<br>Fields Keys</br>";
$newFieldsQ = implode(',', array_keys($newFields));
var_dump($newFieldsQ); //  "0,1,:0,:1"
print($newFieldsQ); //  0,1,:0,:1
