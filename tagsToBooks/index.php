<?php
require_once '../navbar.html';
require_once '../header.html';
require_once '../models/TagsToBooks.php';

if ($_POST) {
    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]) . "?id[]=" . implode(",", $_POST['tags']) . "");
} else {
    $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
    $tagBook = new TagsToBooks();
    $result = $tagBook->fetchTagBooks($id);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-6 ml-4">
                <h2>Books Associated With Tags</h2>
                <select class=' form-control' name='tags[]' multiple='multiple'>
                    <?php
                    require '../models/Tag.php';
                    $tag = new Tag();
                    foreach ($tag->fetchAll() as $row) : ?>
                        <option value=<?= $row->id ?>><?= $row->tag ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Show</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container">
    <div class="row no-gutters">
        <?php
        foreach ($result as $row) :  ?>
            <div class="col-3 ml-3">
                <?= $row->tag ?>
                <div class="card">
                    <?= '<img class="card-img-top" src="/PHP-OOP-CRUD/static/' . $row->book_image . '" alt="no_image";"> </img>'; ?>
                    <div class="card-body ">
                        <p class="card-text">Book Title: <?= $row->title; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../footer.html'; ?>