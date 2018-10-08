<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    protected $table = 'event_categories';

    protected $fillable = [
        'id', 'event_id', 'category_id'

    ];

    protected $hidden = [
        'id', 'event_id', 'category_id'
    ];
}