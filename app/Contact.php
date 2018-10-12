<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'user_id', 'landline_number', 'mobile_number'

    ];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
