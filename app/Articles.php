<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'created_at', 'updated_at', 'posted_by', 'modified_by', 'status_id',
        'articletype_id',

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
