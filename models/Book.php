<?php
require_once("../db/BaseModel.php");
require_once("../models/BookTags.php");


class Book extends BaseModel
{
    protected $fields = [
        "id",
        "title",
        "book_image",
        "author_id"
    ];


    // we are receiving title, author_id, tags, image
    // our table "books" should receive lastId inserted id, title, author_id, book_image

    protected $table = "books";

    public function insertBook(array $data)
    {

        $tagModel = new BookTags();
        $lastId = "select max(id) id from " . $this->table . ""; // get max id
        $imageName = $this->uploadPhoto($data['image'])["name"]; // go inside image array and get the name inside 'image' => 'name.jpg'
        $tags = $data['tags']; // go inside tags table get the ids selected
        unset($data['image']); // remove 'image' only from 'image'=>'name'
        unset($data['tags']); // remove 'tags' only from 'tags'=>'name'
        $data['book_image'] = $imageName; // add book_image to get book_image => name.jpg
        $this->insert($data); // modify inserted data
        $insertedId = $this->fetchRaw($lastId); //fetch last inserted id raw
        $bookId =  $insertedId[0]["id"]; //get last id number inserted
        foreach ($tags as $tag) { //go inside tags and get the tag foreach raw
            $tagModel->insert(array(
                "tag_id" => $tag,
                "book_id" => $bookId
            ));
        }
    }
    function readOne($id)
    {
        $query = "SELECT
        books.book_id,
        books.title,
        books.book_image,
        authors.id author,
        GROUP_CONCAT(tags.id SEPARATOR ',') tags
        
    FROM
        books
    JOIN
        authors
    ON
        authors.id = books.author_id
    JOIN
        books_tags
    ON
        books_tags.book_id = books.book_id
    JOIN
        tags
    ON
        tags.id = books_tags.tag_id

    WHERE books.book_id = ?

    GROUP BY
        books.book_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $this->title = $row->title;
        $this->author_id = $row->author;
        $this->book_image = $row->book_image;
        $this->tagIds =  explode(",", $row->tags);
    }

    public function getList()
    {
        $query = "SELECT 
            books.id,
            books.author_id,
            books.title,
            books.book_image,
            authors.author author,
            GROUP_CONCAT(tags.tag SEPARATOR ',') tags
        FROM
            books
        LEFT JOIN
            authors
        ON
            authors.id = books.author_id
        LEFT JOIN
            books_tags
        ON
            books_tags.book_id = books.id
        LEFT JOIN
            tags
        ON
            tags.id = books_tags.tag_id
        GROUP BY
            books.id";
        $result = $this->fetchAll($query);
        return $result;
    }

    private function uploadPhoto($image)
    {
        $result_message = "";
        // now, if image is not empty, try to upload the image
        if ($image) {
            // sha1_file() function is used to make a unique file name
            $target_directory = $_SERVER['DOCUMENT_ROOT'] . "/PHP-OOP-CRUD/static/";
            $target_file = $target_directory  . $image["name"];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            // error message is empty
            $file_upload_error_messages = "";
            // make sure that file is a real image
            $check = getimagesize($image["tmp_name"]);
            // make sure certain file types are allowed
            $allowed_file_types = array("jpg", "jpeg", "png", "gif");
            if (!in_array($file_type, $allowed_file_types)) {
                throw new Error("Only JPG, JPEG, PNG, GIF files are allowed.");
            }
            // make sure file does not exist
            // if (file_exists($target_file)) {
            //     throw new Error("Image already exists. Try to change file name.");
            // }
            // make sure submitted file is not too large, can't be larger than 1 MB
            if ($image['size'] > (99999999999999999999)) {
                throw new Error("Image must be less than 1 MB in size.");
            }
            if ($check !== false) {
                // make sure the 'uploads' folder exists
                // if not, create it
                // if (!is_dir($target_directory)) {
                //     mkdir($target_directory, 775, true);
                // }
                // move_uploaded_file($image["tmp_name"], $target_file);
                // return array(
                //     "name" => $image["name"]
                // );
            } else {
                throw new Error("Submitted file is not an image.");
            }
        } else {
            throw new Error("How about sending a fucking object first?");
        }
    }
}
