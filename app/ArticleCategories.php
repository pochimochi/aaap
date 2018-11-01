<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategories extends Model
{
    protected $table = 'article_categories';

    public function article(){
        return $this->hasOne('\App\Articles', 'articletype_id');
    }
}
