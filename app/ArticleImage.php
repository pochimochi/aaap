<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $table = 'articleimages';

    protected $fillable = [
        'articleimageId', 'articleId', 'imageId',

    ];

    protected $hidden = [
        'articleimageId', 'articleId', 'imageId',
    ];
}
