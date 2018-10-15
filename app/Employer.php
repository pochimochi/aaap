<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'employerName', 'employerAddress', 'employerContactNumber', 'address_id'

    ];

    protected $hidden = [
        'userId'
    ];

    public function pwa()
    {
        return $this->hasOne('\App\Pwa');

    }
    public function address()
    {
        return $this->belongsTo('\App\Address');

    }
}
