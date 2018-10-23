<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{


    protected $fillable = [
        'role_id', 'firstname', 'middlename', 'lastname', 'gender', 'profile_id', 'email',
        'password', 'permanentaddress_id', 'temporaryaddress_id', 'idverification_id', 'created_at', 'updated_at',
        'active', 'statusdate', 'approvedby', 'emailcode',

    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];

    use \Illuminate\Auth\Authenticatable;

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function auditlogs()
    {
        return $this->hasMany('App/AuditLog');
    }

    public function usertype()
    {
        return $this->belongsTo('\App\UserType', 'role_id');
    }

    public function temporaryaddress()
    {
        return $this->belongsTo('\App\Address');
    }

    public function permanentaddress()
    {
        return $this->belongsTo('\App\Address');
    }

    public function contact()
    {
        return $this->hasOne('\App\Contact');
    }

    public function profilepic()
    {
        return $this->belongsTo('\App\Images', 'profile_id');
    }

    public function idverification()
    {
        return $this->belongsTo('\App\Images');
    }

    public function pwa()
    {
        return $this->hasOne('\App\Pwa');
    }

    public function event()
    {
        return $this->hasOne('\App\Event', 'posted_by');
    }

    public function announcement()
    {
        return $this->hasOne('\App\Announcements', 'posted_by');
    }

    public function articles()
    {
        return $this->hasOne('\App\Article', 'posted_by');
    }

    public function attendance()
    {
        return $this->hasMany('\App\EventAttendance', 'user_id');
    }


}