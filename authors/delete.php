<?php
require_once "../models/Author.php";

if (isset($_POST['author'])) {

    $author = new Author;
    $author->author = $_POST['author'];
}
