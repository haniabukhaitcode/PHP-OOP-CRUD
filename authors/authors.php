<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require_once('../basemodel/authors.php'); ?>
            <table class="table table-dark">
                <th>ID</th>
                <th>Author</th>
                <?php
                $author = new Author;
                foreach ($author->fetch() as $data) :
                    ?>
                    <tr>
                        <td><?php echo $data->id; ?></td>
                        <td><?php echo $data->author; ?></td>
                        <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['book_id']; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $row['book_id'] ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>