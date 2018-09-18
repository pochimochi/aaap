<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $table = 'Users';

    protected $fillable = [
        'userTypeId', 'userFirstName', 'userMiddleName', 'userLastName', 'userGenderId', 'userProfPic',
        'userPassword', 'permanentAddress', 'temporaryAddress', 'idVerification', 'created_at', 'updated_at',
        'membershipStatus', 'statusDate', 'approvedBy', 'emailCode', 'emailAddress'

    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];

    public function getAuthPassword() {
        return $this->userPassword;
    }

    use \Illuminate\Auth\Authenticatable;
}

