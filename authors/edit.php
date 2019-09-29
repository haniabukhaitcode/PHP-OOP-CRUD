<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/Author.php';
$author = new Author();

$author = $author->fetchOne($_GET['id']);

?>
<?php
if (isset($_POST['save_author'])) {
    require_once '../models/Author.php';
    $author = new Author;
    $author->update(
        $_POST['id'],
        [
            'author' => $_POST['author']
        ]
    );
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
                    <h4 class="mb-4">Add Authors</h4>
                    <form action="index.php" class="form" method="post">
                        <input type="hidden" name="id" value="<?php echo $author->id; ?>">
                        <div class="form-group">

                            <input type="text" name="author" value="<?php echo $author->author; ?>" class="form-control" placeholder="Enter author name">
                        </div>
                        <input type="submit" name="save_author" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
