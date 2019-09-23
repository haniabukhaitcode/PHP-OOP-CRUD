<?php
require_once("../db/BaseModel.php");


class Tag extends BaseModel
{
    protected $fields = [
        "id",
        "tag"
    ];

    protected $table = 'tags';
}
