<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'usertype';
    public $timestamps = false;
    protected $fillable = [
        'name'

    ];

    protected $hidden = [

    ];
}
