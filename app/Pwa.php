<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pwa extends Model
{
    protected $table = 'pwa';

    public $timestamps = false;

    protected $fillable = [
        'pwaLastName', 'pwaFirstName', 'pwaMiddleName', 'pwaGender', 'pwaOccupation', 'user_id', 'pwaRelationship', 'employer_id'

    ];

    protected $hidden = [
        'userId'
    ];

    public function pwa()
    {
        return $this->belongsTo('\App\User');
    }

    public function employer()
    {
        return $this->belongsTo('\App\Employer', 'employer_id');
    }
}
