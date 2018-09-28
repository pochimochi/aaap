<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{


    public function getAuthPassword()
    {
        return $this->userPassword;
    }

    use \Illuminate\Auth\Authenticatable;
}

