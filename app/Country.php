<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public $timestamps = false;

    protected $fillable = [
        'name'

    ];

    protected $hidden = [

    ];
    public function address()
    {
        return $this->hasMany('\App\Address');
    }
}
