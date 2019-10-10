<?php

require_once "../models/Author.php";
if (isset($_POST['editAuthor'])) {
    $author = new Author;
    $author->author = $_POST['editAuthor'];
    $id->id = $_POST['id'];
}
