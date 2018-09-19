<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';

    public $timestamps = false;

    protected $fillable = [
        'userId', 'employerName', 'employerAddress', 'employerContactNumber'

    ];

    protected $hidden = [
        'userId'
    ];
}
