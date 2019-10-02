<?php
require_once "../models/Book.php";


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $book = new Book;
    $book->delete(array("id" => $id));
}
?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<h1>Are you sure you want to delete <a class="btn btn-sm btn-success col-1" href="index.php">No</a> &nbsp; <a class="btn btn-sm btn-danger col-1" href="delete.php?del=<?= $_GET['id'] ?>">yes</a></h1>

<?php
require_once '../footer.html'; ?>