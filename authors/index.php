<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require_once('../models/tables.php'); ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $author = new Author;
                    foreach ($author->fetch() as $row) :
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->author; ?></td>
                            <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id; ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>