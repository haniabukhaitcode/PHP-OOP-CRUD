<?php
if (isset($_POST['save-book'])) {
    require_once("../models/tables.php");
    $book = new Book;
    $book->insert(
        [
            'title' => $_POST['title'],
            'author_id' => $_POST['author_id'],
            'tag_id' => $_POST['tag_id'],
            'book_image' => $_POST['book_image']
        ]
    );
}
header('Location: create.php');
?>
<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h4 class="mb-4">Add Books</h4>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter book name">
                                </div>

                                <div class="form-group">
                                    <label>Author</label>
                                    <div class="mb-3">
                                        <select class='form-control' name='author_id'>
                                            <?php

                                            foreach ($author->fetch() as $row) : ?>
                                                <option value="<?= $row->id; ?>"><?= $row->author ?></option>;
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tag</label>
                                    <div class="mb-3">
                                        <select class='form-control' name='tag_id[]' multiple='multiple'>
                                            <?php

                                            foreach ($tag->fetch() as $row) : ?>
                                                <option value=<?= $row->id; ?>><?= $row->tag ?></option>;
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <input type="file" name="book_image" id="book_image">
                                    </div>
                                </div>

                                <input type="submit" name="save-book" class="btn btn-primary" />
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            </body>

            </html>