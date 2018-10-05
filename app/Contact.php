<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    public $timestamps = false;

    protected $fillable = [
        'userId', 'landlineNumber', 'mobileNumber'

    ];

    protected $hidden = [
        'userId'
    ];
}
