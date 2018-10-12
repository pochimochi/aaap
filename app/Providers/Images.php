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

    public function event()
    {
        return $this->hasOne('\App\Event', 'image_id');
    }

    public function announcement()
    {
        return $this->hasOne('\App\Announcements', 'images_id');
    }
}
