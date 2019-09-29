<?php

require_once("../db/BaseModel.php");
class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"

    ];
    protected $table = "authors";
}
