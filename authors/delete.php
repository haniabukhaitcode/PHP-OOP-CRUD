<?php
require_once "../models/Author.php";

if (isset($_POST['deleteAuthor'])) {

    $author = new Author;
    $author->author = $_POST['deleteAuthor'];
    $id->id = $_POST['id'];
}
