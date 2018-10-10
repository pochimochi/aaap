<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $timestamps = false;

    protected $fillable = [
        'imageId', 'location'

    ];

    protected $hidden = [

    ];
    public function user()
    {
        return $this->hasOne('\App\User');
    }
}
