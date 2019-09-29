<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

require_once '../models/Author.php';
$authorMapper = new Author();
$author = $authorMapper->fetchOne($_GET['id']);
//var_dump($_POST);
//die;
if (isset($_POST['save_author'])) {

    $authorMapper->update(

        [
            'author' => $_POST['author']
        ],
        ["id" => $_POST['id']]
    );
    header("location:index.php");
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
                    <form action="edit.php?id=<?php echo $author->id; ?>" class="form" method="post">
                        <input type="hidden" name="id" value="<?php echo $author->id; ?>">
                        <div class="form-group">

                            <input type="text" name="author" value="<?php echo $author->author; ?>" class="form-control" placeholder="Enter author name">
                        </div>
                        <input type="submit" name="save_author" value="save_author" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
