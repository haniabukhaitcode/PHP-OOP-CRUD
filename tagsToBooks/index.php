<?php
require_once '../navbar.html';
require_once '../header.html';
require_once '../models/TagsToBooks.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$tagBook = new TagsToBooks();
$result = $tagBook->fetchTagBooks($id);

?>

<div class="container">
    <div class="row no-gutters">
        <div class="col-6 ml-4">
            <h2>Books Associated With Tags</h2>
            <select class=' form-control' name='tags[]' multiple='multiple'>
                <?php
                require '../models/Tag.php';
                $tag = new Tag();
                foreach ($tag->fetchAll() as $row) :
                    if (in_array($row->id, $row->tags)) : ?>
                        <option selected value=<?= $row->id ?>><?= $row->tag ?></option>
                    <?php else : ?>
                        <option value=<?= $row->id ?>><?= $row->tag ?></option>
                <?php endif;
                endforeach; ?>
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</div>




<div class="container">
    <div class="row no-gutters">
        <div class="col-12 ml-4">
            <h2>
                <?php
                foreach ($result as $row) :  ?>
                    <?= $row->tag;
                        break; ?>
                <?php endforeach; ?></p>
            </h2>
        </div>
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