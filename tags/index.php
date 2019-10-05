<?php require_once '../navbar.html';
require_once '../header.html'; ?>

<div class="row">
    <h4 class="col-12 mb-3">All Tags</h4>
    <a type="submit" class="btn btn-success col-2 mb-4 ml-3 p-1" href="create.php">Create Tag</a>
</div>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tag</th>
            <th scope="col">Action</th>
        </tr>

    </thead>
    <tbody>
        <?php
        require_once '../models/Tag.php';
        $tags = new Tag;
        foreach ($tags->fetchAll() as $row) : ?>
            <tr>
                <th scope="row"><?= $row->id; ?></th>
                <td><a href="/PHP-OOP-CRUD/tagsToBooks/index.php?id=<?= $row->id; ?>"><?= $row->tag; ?></a></td>
                <td><a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row->id; ?>">Edit</a> &nbsp; <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../footer.html'; ?>