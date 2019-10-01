<!-- Navbar -->
<?php require_once '../navbar.html';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

?>

<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<div class="row">
    <h4 class="col-12 mb-3" name="author"> Title</h4>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
    <div class="row no-gutters">
        <?php
        require_once '../models/AuthorBook.php';
        $authorBook = new AuthorBook();
        foreach ($authorBook->fetchAuthorBooks() as $row) :  ?>
            <div class="card col">
                <?php echo '<img class="card-img-top" src="/books/uploads/' . $row["book_image"] . '" alt="no_image";"> </img>'; ?>
                <div class="card-body">
                    <p class="card-text">Author Name: <?php echo $row['author']; ?></p>
                    <p class="card-text">Book Title: <?php echo $row['title']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
</form>

<?php require_once '../footer.html'; ?>