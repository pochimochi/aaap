<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = false;

    protected $fillable = [
        'name'

    ];

    protected $hidden = [

    ];
    public function address()
    {
        return $this->hasOne('\App\Address');
    }

}
