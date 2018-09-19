<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pwa extends Model
{
    protected $table = 'pwa';

    public $timestamps = false;

    protected $fillable = [
        'pwaLastName', 'pwaFirstName', 'pwaMiddleName', 'pwaGenderId', 'pwaOccupation'

    ];

    protected $hidden = [
        'userId'
    ];
}
