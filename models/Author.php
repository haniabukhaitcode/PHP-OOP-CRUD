<?php
require "../db/BaseModel.php";
require "../models/Author.php";
class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"
    ];

    protected $table = "authors";
}

function updateAuthor(int $id, array $data)
{ {
        $this->update($id); // modify inserted data
        $this->fetchOne($data); // modify inserted data

    }
}
