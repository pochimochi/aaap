<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    public $timestamps = false;

    protected $fillable = [
         'location'

    ];

    protected $hidden = [

    ];

    public function user()
    {
        return $this->hasOne('\App\User', 'profile_id');
    }
    public function userverification()
    {
        return $this->hasOne('\App\User', 'idverification_id');
    }

    public function event()
    {
        return $this->belongsToMany('\App\Event', 'event_images');
    }

    public function announcement()
    {
        return $this->belongsToMany('\App\Announcements', 'announcement_images', 'image_id', 'announcement_id');
    }
    public function article()
    {
        return $this->belongsToMany('\App\Articles', 'announcement_images', 'image_id', 'article_id');
    }
}
