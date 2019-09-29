<?php
require_once "../db/BaseModel.php";

class BookTags extends BaseModel
{
    protected $fields = [
        "tag_id",
        "book_id"
    ];

    protected $table = "books_tags";
}
