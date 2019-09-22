<?php
if (isset($_POST['delete_book'])) {
    require_once("./models/Model.php");
    $book = new Book;
    $book->delete($_POST['id']);
}
header('Location: index.php');
