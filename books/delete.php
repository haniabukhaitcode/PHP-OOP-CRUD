<?php
require_once "../models/Book.php";


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $book = new Book;
    $book->delete($id);
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
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Are you sure you want to delete <a class="btn btn-sm btn-success col-1" href="index.php">No</a> &nbsp; <a class="btn btn-sm btn-danger col-1" href="delete.php?del=<?php echo $_GET['id'] ?>">yes</a></h1>
            </div>
        </div>
    </div>

</body>

</html>