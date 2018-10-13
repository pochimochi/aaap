<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_role';
    public $timestamps = false;
    protected $fillable = [
        'name'

    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->hasOne('\App\User', 'role_id');
    }

}
