<?php

require_once '../navbar.html';
require_once '../header.html';

?>

<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/Author.php';
$authorMapper = new Author();
$author = $authorMapper->fetchOne($_GET['id']);

if (isset($_POST['save_author'])) {

    $authorMapper->update(

        [
            'author' => $_POST['author']
        ],

        [
            "id" => $_POST['id']
        ]
    );
    header("location:index.php");
}

?>

<div class="jumbotron">
    <h4 class="mb-4">Add Authors</h4>
    <form action="edit.php?id=<?= $author->id; ?>" class="form" method="post">
        <input type="hidden" name="id" value="<?= $author->id; ?>">
        <div class="form-group">

            <input type="text" name="author" value="<?= $author->author; ?>" class="form-control" placeholder="Enter author name">
        </div>
        <input type="submit" name="save_author" value="save_author" class="btn btn-primary" />
    </form>
</div>
<?php

require_once '../footer.html';


?>