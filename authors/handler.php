<?php


if (isset($_POST['handler'])) {
    ?>
    <table class="table table-dark">
        <thead>
            <th>ID</th>
            <th>Author</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
                require_once '../models/Author.php';
                $author = new Author;
                foreach ($author->fetchAll() as $row) : print_r($author) ?>
                <tr>
                    <th scope="row"><?= $row->id; ?></th>
                    <td><span id="author<?= $row->id; ?>"><?= $row->author; ?></span></td>
                    <td>
                        <a style="cursor:pointer;" class="btn btn-sm btn-primary edit" data-id="<?= $row->id; ?>"> Edit</a>&nbsp;
                        <a style="cursor:pointer;" class="btn btn-sm btn-danger delete" data-id="<?= $row->id; ?>"> Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
<?php
}
?>