<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/AuthorBook.php';

$authorBook = new AuthorBook();




?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<div class="row">
    <h4 class="col-12 mb-3" name="author"> </h4>
</div>

<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
    <div class="row no-gutters">
        <?php
        foreach ($authorBook->fetchAll() as $row) :  ?>
            <div class="card col" value="<?= $row->author_id; ?>">
                <?= '<img class="card-img-top" src="/PHP-OOP-CRUD/static/' . $row->book_image . '" alt="no_image";"> </img>'; ?>
                <div class="card-body">
                    <p class="card-text" value="<?= $row->author_id; ?>" name="<?= $row->author; ?>">Author Name:</p>
                    <p class="card-text">Book Title: <?= $row->title; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
</form>

<?php
require_once '../footer.html'; ?>