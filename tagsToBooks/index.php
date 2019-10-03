<?php
require_once '../navbar.html';
require_once '../header.html';
require_once '../models/TagsToBooks.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$tagBook = new TagsToBooks();
$result = $tagBook->fetchTagBooks($id);

?>

<div class="container">
    <div class="row">
        <div class="col-4 ml-4">
            <h2>
                Tag Name:
                <?php
                foreach ($result as $row) :  ?>
                    <a <?= $row->tag; ?>> <?= $row->tag; ?></a>
                <?php endforeach; ?>
            </h2>
            <h2> Author Name:
                <?php
                foreach ($result as $row) :  ?>
                    <a><?= $row->author; ?></a>
                <?php endforeach; ?>
            </h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row no-gutters">
        <?php
        foreach ($result as $row) :  ?>
            <div class="card col-4 ml-4">

                <?= '<img class="card-img-top" src="/PHP-OOP-CRUD/static/' . $row->book_image . '" alt="no_image";"> </img>'; ?>
                <div class="card-body">
                    <p class="card-text">Book Title: <?= $row->title; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../footer.html'; ?>