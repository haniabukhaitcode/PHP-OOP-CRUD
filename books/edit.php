<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
require_once("../db/BaseModel.php");
require '../models/Book.php';
require '../models/Author.php';
require '../models/Tag.php';

$book = new Book;
$author = new Author;
$tag = new Tag;
$book->readOne($id);

if ($_POST) {
    $book->updateBook(

        $_POST['id'],

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Create Student</title>
</head>

<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                            <div>
                                <label>Title</label>
                                <input type='text' name='title' class='form-control' /></label>
                            </div>
                            <div class="mt-3">
                                <label>Author</label>
                                <select class=' form-control' name='author_id'>
                                    <?php
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
                                <select class=' form-control' name='tag_id[]' multiple='multiple'>
                                    <?php
                                    $tag = new Tag();
                                    foreach ($tag->fetchRaw() as $row) :
                                        if (in_array($row['id'], $book->tagIds)) : ?>
                                            <option selected value=<?= $row['id'] ?>><?= $row['tag'] ?></option>
                                        <?php else : ?>
                                            <option value=<?= $row['id'] ?>><?= $row['tag'] ?></option>
                                    <?php endif;
                                    endforeach; ?>

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
    </div>
</body>

</html>