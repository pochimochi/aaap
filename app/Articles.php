<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{


    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'created_at', 'updated_at', 'posted_by', 'modified_by', 'status_id',
        'articletype_id', 'due_date',

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User', 'posted_by');

    }

    public function image()
    {
        return $this->belongsToMany('\App\Images', 'article_images', 'article_id', 'image_id');
    }
}


