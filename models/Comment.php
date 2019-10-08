<?php

require_once "../db/BaseModel.php";


class Comment extends BaseModel
{
    protected $fields = [
        "id",
        "author",
        "message"
    ];

    protected $table = 'comments';
}
