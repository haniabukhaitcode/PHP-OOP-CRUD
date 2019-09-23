<?php
if (isset($_POST['save_book'])) {
    require_once("./models/Model.php");
    $book = new Book;
    $book->update(
        $_POST['id'],
        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tag_id" => $_POST["tag_id"],
            "book_image" => $_FILES["book_image"]
        ]
    );
}
header('Location: index.php');
