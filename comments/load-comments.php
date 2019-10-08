<?php
include "../models/Comment.php";

$comment = new Comment();

$commentNewCount = $_POST['commentNewCount'];

$sql = "SELECT * FROM comments LIMIT $commentNewCount";
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