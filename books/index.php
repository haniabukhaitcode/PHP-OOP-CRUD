<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require '../models/Book.php'; ?>
            <div class="row">
                <h4 class="col-12 mb-3">All Books</h4>
                <a type="submit" class="btn btn-success col-2 mb-4 ml-3 p-1" href="create.php">Insert a book</a>
            </div>
            <table class="table table-dark">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    $book = new Book();
                    $data = $book->readAll();
                    foreach ($data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row->id; ?></th>
                            <td><?= $row->title; ?></td>
                            <td><a href="/books/authorBooks/index.php?id=<?= $row->author_id; ?>"><?= $row->author; ?></a></td>
                            <td><?= $row->tags; ?></td>
                            <td><?= '<img src="/PHP-OOP-CRUD/static/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                            <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</body>

</html>