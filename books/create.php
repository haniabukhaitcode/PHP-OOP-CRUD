<?php require_once('../navbar.html'); ?>
<?php require '../models/tables.php';

if ($_POST) {

    $book = new Book;
    $book->insert(
        [
            "title" => $_POST["title"],
            "author_id" => $_POST["author_id"],

            "book_image" => $_FILES["book_image"]
        ]
    );
}

?>
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
                                        <select class='form-control' name="author_id">
                                            <?php
                                            $author = new Author;
                                            foreach ($author->fetch() as $row) : ?>
                                                <option value="<?= $row->author; ?>"><?= $row->author; ?></a></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class='form-control' name="tag_id[]" multiple="multiple">
                                        <?php
                                        $tag = new Tag;
                                        foreach ($tag->fetch() as $row) : ?>
                                            <option value="<?= $row->tag; ?>"><?= $row->tag; ?></a></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <input type="file" name="book_image" id="book_image">
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="btn btn-primary" />
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            </body>

            </html>