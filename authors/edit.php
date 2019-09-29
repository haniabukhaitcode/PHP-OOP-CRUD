<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/Author.php';
$author = new Author();

$author->fetchOne($id);


if ($_POST) {
    $author->update(
        $_POST['id'],

        [
            "author" => $_POST["author"]
        ]

    );
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php require_once('../navbar.html'); ?>


    <!-- Table -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Edit Authors</h4>

                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <input type='text' name='author' value='<?= $author->author['author']; ?>' class='form-control' />
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

</body>

</html>