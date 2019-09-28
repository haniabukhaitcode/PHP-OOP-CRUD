<?php
require_once '../models/Author.php';

if ($_POST) {
    $author = new Author;
    $author->insert(
        [
            "author" => $_POST["author"]
        ]
    );
    header("Location: index.php");
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Add Authors</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" placeholder="Enter author name">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>