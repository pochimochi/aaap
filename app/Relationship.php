<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationships';
    public $timestamps = false;

    protected $fillable = [
        'pwaIdNumber', 'userId', 'description'

    ];

    protected $hidden = [
        'userId'
    ];
}
