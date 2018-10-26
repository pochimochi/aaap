<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $table = 'articletype';

    protected $fillable = [
        'articleTypeId', 'name',

    ];

    protected $hidden = [

    ];
}
