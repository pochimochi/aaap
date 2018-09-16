<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'Users';

    protected $fillable = [
        'userTypeId', 'userFirstName', 'userMiddleName', 'userLastName', 'userGenderId', 'userProfPic',
        'userPassword', 'permanentAddress', 'temporaryAddress', 'idVerification', 'created_at', 'updated_at',
        'membershipStatus', 'statusDate', 'approvedBy', 'emailCode'

    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];
}
