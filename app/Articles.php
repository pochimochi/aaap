<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{


    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'created_at', 'updated_at', 'posted_by', 'modified_by', 'status',
        'articletype_id', 'due_date', 'remarks'

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function articletype()
    {
        return $this->belongsTo('\App\ArticleCategories', 'articletype_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'posted_by');

    }

    public function modifieduser()
    {
        return $this->belongsTo('\App\User', 'modified_by');

    }

    public function image()
    {
        return $this->belongsToMany('\App\Images', 'article_images', 'article_id', 'image_id');
    }
}


