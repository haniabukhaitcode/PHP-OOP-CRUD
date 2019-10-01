<?php
require_once '../models/Author.php';
if ($_POST) {
    $author = new Author;
    $author->insert(
        [
            "author" => $_POST["author"]
        ]
    );
    header("Location: index.php");
}
?>

<?php

require_once '../navbar.html';
require_once '../header.html';

?>

<div class="jumbotron">
    <h4 class="mb-4">Add Authors</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="author" class="form-control" placeholder="Enter author name">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" />
    </form>
</div>

<?php require_once '../footer.html'; ?>