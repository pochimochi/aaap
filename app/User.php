<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'Users';

    public $primaryKey = 'userId';

    protected $fillable = [
        'userTypeId', 'firstName', 'middleName', 'lastName', 'genderId', 'profPic',
         'permanentAddress', 'temporaryAddress', 'idVerification', 'occupation',
        'dateApplied', 'dateModified', 'membershipStatus', 'statusDate', 'approvedBy', 'emailCode'

    ];

    protected $hidden = [
        'password'
    ];
}
