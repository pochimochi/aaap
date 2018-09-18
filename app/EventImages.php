<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    protected $table = 'eventimages';

    protected $fillable = [
        'eventImageId', 'imageId', 'eventId'
    ];

    protected $hidden = [
        'eventImageId', 'imageId', 'eventId'
    ];
}
