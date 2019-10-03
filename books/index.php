<?php require_once '../navbar.html';
require_once '../header.html';
require '../models/Book.php';
$book = new Book();
// if (isset($_POST['submit'])) {
//     $selected_val = $_POST['tags'];
// }
if (isset($_POST['submit'])) {
    // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
    foreach ($_POST['tags'] as $select) {
        return $select; // Displaying Selected Value
    }
}
?>






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
        <form action="/PHP-OOP-CRUD/tagsToBooks/index.php?id=" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <h3>Select Books associated with tags</h3>

                <select class='form-control' name='tags[]' multiple='multiple'>
                    <?php
                    $tags = $book->fetchTagIDs();
                    foreach ($tags as $tag) : ?>
                        <option>
                            <a value="Get Selected Values"><?= $tag->tagID; ?></a>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary">Go</button>
                </div>
            </div>

        </form>

        <?php
        $url = "" . http_build_query(array());
        $tags = $book->fetchTagIDs();
        foreach ($tags as $tag) :  ?>
            <tr>
                <td><a href="/PHP-OOP-CRUD/tagsToBooks/index.php?id=<?= $tag->tagID; ?>"><?= $tag->tag; ?></a></td>
                <td><a href="/PHP-OOP-CRUD/tagsToBooks/index.php?id=<?= $tag->tagID .  $url .= '&id[]=' . $tag->tagID; ?>"><?= $tag->tagID; ?></a></td>
            </tr>

        <?php
        endforeach; ?>

        <?php
        $data = $book->readAll();
        foreach ($data as $row) : ?>
            <tr>
                <th scope="row"><?= $row->id;  ?></th>
                <td><?= $row->title; ?></td>
                <td><a href="/PHP-OOP-CRUD/authorsBooks/index.php?id=<?= $row->author_id; ?>"><?= $row->author; ?></a></td>
                <td><a href="/PHP-OOP-CRUD/tagsToBooks/index.php?id=<?= $row->id; ?>"><?= $row->tag; ?></a></td>
                <td><?= '<img src="/PHP-OOP-CRUD/static/' . $row->book_image . '" alt="no_image" style="width:100px;height:100px;"> </img>'; ?></td>
                <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id ?>">Delete</a></td>
            </tr>

        <?php
        endforeach; ?>
    </tbody>
</table>

<?php require_once '../footer.html'; ?>

<!-- print($row->books_tagsID); -->