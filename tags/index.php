<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require '../models/tables.php'; ?>
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
                    $tag = new Book;
                    foreach ($tag->fetchOne() as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row->id; ?></th>
                            <td><?= $row->tags; ?></td>
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