<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'articleId';
    protected $fillable = [
        'id', 'title', 'body', 'created_at', 'updated_at', 'postedBy', 'modifiedBy', 'statusId',
        'articleTypeId',

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
