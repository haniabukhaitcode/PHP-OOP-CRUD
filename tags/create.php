<?php
require_once '../models/Tag.php';
if ($_POST) {
    $tag = new Tag;
    $tag->insert(
        [
            "tag" => $_POST["tag"]
        ]
    );
    header("Location: index.php");
}
?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<div class="jumbotron">
    <h4 class="mb-4">Add Tags</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="tag" class="form-control" placeholder="Enter tag name">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" />
    </form>
</div>

<?php require_once '../header.html'; ?>