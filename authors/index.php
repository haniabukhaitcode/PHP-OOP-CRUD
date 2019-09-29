<?php require_once '../navbar.html'; ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <h4 class="col-12 mb-3">All Authors</h4>
                <a type="submit" class="btn btn-success col-2 mb-4 ml-3 p-1" href="create.php">Create Author</a>
            </div>
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
                    require_once "../db/BaseModel.php";
                    require_once '../models/Author.php';
                    $author = new Author;
                    foreach ($author->fetchAll() as $row) :
                        ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->author; ?></td>
                            <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id; ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>