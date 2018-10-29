<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementImages extends Model
{
    protected $fillable = [
        'event_id', 'image_id','created_at','updated_at'
    ];
}
