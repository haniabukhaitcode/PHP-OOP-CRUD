<?php require_once('../navbar.html'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <?php require_once('../basemodel/authors.php'); ?>
            <table class="table table-dark">
                <th>ID</th>
                <th>Author</th>
                <?php
                $data = array();
                $keys = [1, 2, 3, 4];
                foreach ($data as $key => $value) : $keys[':' . $key] = $value;
                    print_r($keys);
                    ?>
                    <h1><?php print_r($keys); ?></h1>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>