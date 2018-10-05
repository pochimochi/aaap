<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $primaryKey ='addressId';
    public $timestamps = false;

    protected $fillable = [
        'unitno', 'bldg', 'street', 'cityId', 'countryId'

    ];

    protected $hidden = [

    ];
}
