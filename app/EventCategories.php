<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    protected $table = 'eventcategories';

    protected $fillable = [
        'eventCategoryId', 'eventId', 'categoryId'

    ];

    protected $hidden = [
        'eventCategoryId', 'eventId', 'categoryId'
    ];
}
