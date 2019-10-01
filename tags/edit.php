<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/Tag.php';
$tagMapper = new Tag();
$tag = $tagMapper->fetchOne($_GET['id']);
if (isset($_POST['save_tag'])) {
    $tagMapper->update(

        [
            'tag' => $_POST['tag']
        ],

        [
            "id" => $_POST['id']
        ]
    );
    header("location:index.php");
}
?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<div class="jumbotron">
    <h4 class="mb-4">Add Tags</h4>
    <form action="edit.php?id=<?= $tag->id; ?>" class="form" method="post">
        <input type="hidden" name="id" value="<?= $tag->id; ?>">
        <div class="form-group">

            <input type="text" name="tag" value="<?= $tag->tag; ?>" class="form-control" placeholder="Enter tag name">
        </div>
        <input type="submit" name="save_tag" value="save_tag" class="btn btn-primary" />
    </form>
</div>

<?php require_once '../footer.html'; ?>