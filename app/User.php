<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $table = 'Users';

    protected $fillable = [
        'userTypeId', 'userFirstName', 'userMiddleName', 'userLastName', 'userGenderId', 'userProfPic', 'emailAddress',
        'userPassword', 'permanentAddress', 'temporaryAddress', 'idVerification', 'created_at', 'updated_at',
        'membershipStatus', 'statusDate', 'approvedBy', 'emailCode',

    ];

    protected $hidden = [
        'userPassword', 'created_at', 'updated_at',
    ];

    use \Illuminate\Auth\Authenticatable;

    public function getAuthPassword() {
        return $this->userPassword;
    }

    protected $primaryKey = 'userId';
}