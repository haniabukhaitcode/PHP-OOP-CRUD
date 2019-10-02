<?php

//**Update**
function update($id)
{
    // $book->title = $_POST['title'];
    // $book->author_id = $_POST['author_id'];
    // $book->tag_id = $_POST['tag_id'];
    // $book->book_image = $_FILES['book_image'];
    //sql
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $deleteTags = "delete from books_tags where book_id = " . $id . "";
    $bookQuery = "UPDATE
        " . $this->table_name . "
        SET
            title = :title,
            author_id = :author_id,
            book_image = :book_image
        WHERE
            book_id = :book_id";
    $tagQuery = "INSERT INTO  books_tags (book_id, tag_id) VALUES(:book_id, :tag_id) ";
    //statement connection with prepare    
    $stmt = $this->conn->prepare($bookQuery);
    $delStmt = $this->conn->prepare($deleteTags);
    // **Controlling Values From User**
    $imageName = $this->uploadPhoto()["name"];
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->author_id = htmlspecialchars(strip_tags($this->author_id));
    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":author_id", $this->author_id);
    $stmt->bindParam(":book_image", $imageName);
    $stmt->bindParam(":book_id", $id);
    $stmt->execute();
    $id = (int) $id;
    $delStmt->execute();
    foreach ($this->tag_id as $tag) {
        $tagStmnt = $this->conn->prepare($tagQuery);
        $tagStmnt->bindParam(":tag_id", $tag);
        $tagStmnt->bindParam(":book_id", $id);
        $tagStmnt->execute();
    }

    header("Location: index.php");
}
