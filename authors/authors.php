<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Student</title>
</head>

<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table>
                        <th>ID</th>
                        <th>Author</th>
                        <?php
                        require __DIR__ . '/../basemodel/authors.php';
                        $author = new Author;
                        foreach ($author->fetch() as $data) :
                            ?>
                            <tr>
                                <td><?php echo $data->id; ?></td>
                                <td><?php echo $data->author; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>