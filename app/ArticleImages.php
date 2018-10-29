<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImages extends Model
{
    protected $fillable = [
        'article_id', 'image_id','created_at','updated_at'
    ];
}
