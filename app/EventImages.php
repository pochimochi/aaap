<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    protected $table = 'eventimages';

    public $timestamps = false;

    protected $fillable = [
        'image_id', 'event_id'
    ];


}
