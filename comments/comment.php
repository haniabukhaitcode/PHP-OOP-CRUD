<?php
require "../models/Comment.php";

$comment = new Comment();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="ajaxCall.js">

    </script>
    <script>
        $(document).ready(function() {
            var commentCount = 2;
            $('#btn').click(function() {
                commentCount = commentCount + 2;
                $("#comments").load("load-comments.php", {
                    commentNewCount: commentCount
                });
            })
        });
    </script>
    <style>
        body {
            text-align: center;
            font-family: 'Helvetica', sans-serif;
        }
    </style>
</head>

<body>
    <div id="comments">
        <?php
        $sql = "SELECT * FROM comments LIMIT 2";
        print_r($sql);
        // return $this->conn->query("select " . implode(',', $this->fields) . " from " . $this->table)->fetchAll(PDO::FETCH_ASSOC);

        $result = $comment->fetchAll($sql);
        print_r($result);
        if ($result > 0) :
            foreach ($result as $row) : ?>
                <p>
                    <?= $row->author; ?>
                    <br>;
                    <?= $row->message; ?>
                </p>;
            <?php endforeach;
                ?>
        <?php else : ?>
            <h1>There are no comments</h1>


        <?php endif; ?>


    </div>
    <button id="btn">Show more comments</button>
</body>

</html>