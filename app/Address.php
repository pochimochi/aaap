<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public $timestamps = false;

    protected $fillable = [
        'unitno', 'bldg', 'street', 'city_id', 'country_id'

    ];

    protected $hidden = [

    ];

    public function event()
    {
        return $this->hasOne('\App\Event');
    }

    public function city()
    {
        return $this->belongsTo('\App\City');
    }
    public function country()
    {
        return $this->belongsTo('\App\Country');
    }
    public function province()
    {
        return $this->belongsTo('\App\Province');
    }

    public function user()
    {
        return $this->hasOne('\App\User');
    }

    public function employer()
    {
        return $this->hasOne('\App\Employer','address_id');
    }
}
