<?php require_once('../navbar.html'); ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once("../db/BaseModel.php");
require '../models/Book.php';


if ($_POST) {

    $book = new Book;
    $book->updateBook(

        $_GET['id'],

        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],
            "tags" => $_POST["tags"],
            "image" => $_FILES["book_image"]
        ]

    );
    header("Location: index.php");
}
?>




<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h4 class="mb-4">Add Books</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type='text' name='title' class='form-control' /></label>
                    </div>
                    <div class="mt-3">
                        <label>Author</label>
                        <select class=' form-control' name='author_id'>
                            <?php
                            require '../models/Author.php';
                            $author = new Author();
                            foreach ($author->fetchRaw() as $row) :
                                if ($book->author_id == $row['id']) :
                                    ?>
                                    <option selected value="<?= $row['id'] ?>"><?= $row['author'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['author'] ?></option>
                            <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Tag</label>
                        <select class=' form-control' name='tags[]' multiple='multiple'>
                            <?php
                            require '../models/Tag.php';
                            $tag = new Tag();
                            foreach ($tag->fetchRaw() as $row) : ?>
                                <option value=<?= $row['id'] ?>><?= $row['tag'] ?></option>
                            <?php endforeach; ?>


                        </select>
                        <div>
                            <div class="mt-3">
                                <label>Image</label>
                                <input type="file" name="book_image" id="book_image">
                                <?php
                                if (!empty($book->book_image)) : ?>
                                    <td>
                                        <img src="/books/uploads/' . $book->book_image . '" alt="" />
                                    </td>
                                <?php endif; ?>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>