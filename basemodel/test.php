
<?php

require_once("../basemodel/basemodel.php");

class Author extends BaseModel
{
    protected $fields = [
        "id",
        "author"
    ];
    protected $table = "authors";
}
