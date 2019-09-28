<?php include('../navbar.html'); ?>
<?php


require '../models/Author.php';
$author = new Author;
$author = $author->getById($_GET['id']);


if (isset($_POST['save_author'])) {

    $author->updateAuthor(
        $_POST['id'],
        [
            'author' => $_POST['author']
        ]
    );
    header('location: index.php');
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


    <!-- Table -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Edit Authors</h4>

                    <form action="index.php" class="form" method="post">
                        <input type="hidden" name="id" value="<?= $author->id; ?>">
                        <div>
                            <input type="text" name="author" id="author" class="form-control" value="<?php echo $author->author; ?>">
                        </div>

                        <div class="mt-3">
                            <input type="submit" value="Save" name="save_author" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>

</body>

</html>