<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../navbar.html';
require_once '../header.html';

?>


<div class="row">
    <h4 class="col-12 mb-3">All Authors Books</h4>
</div>

<div>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row no-gutters">
                <?php
                require_once '../models/AuthorBook.php';

                $authorBook = new AuthorBook();
                print_r($authorBook);
                $authorBook->fetchOne($id);
                $authorBook->fetchAuthorBooks();
                $result = $authorBook->fetchRow();
                print_r($authorBook);

                foreach ($result as $row) :  ?>
                    <div class="card col">
                        <?= '<img class="card-img-top" src="/books/uploads/' . $row["book_image"] . '" alt="no_image";"> </img>'; ?>
                        <div class="card-body">
                            <p class="card-text" name="author" value="<?= $row['author_id']; ?> ">Author Name: <?= $row['author_id']; ?></p>
                            <p class="card-text">Book Title: <?= $row['title']; ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </form>
</div>

<?php require_once '../footer.html'; ?>