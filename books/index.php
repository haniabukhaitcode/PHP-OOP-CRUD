<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require_once('../models/tables.php'); ?>
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
                    $book = new Book;
                    foreach ($book->fetch() as $row) : ?>
                        <tr>
                            <th scope="row"><?php echo $row->id; ?></th>
                            <td><?php echo $row->title; ?></td>
                            <td><a href="/books/authorBooks/index.php?id=<?php echo $row->author_id; ?>"><?php echo $row->author; ?></a></td>
                            <td><?php echo $row->tags; ?></td>
                            <td><?php echo '<img src="/books/uploads/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                            <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $row->book_id ?>">Delete</a></td>
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