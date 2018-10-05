<?php

namespace App;



use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'eventattendance';

    protected $fillable = [
        'attendanceid',	'eventId',	'date',	'userId'
    ];

    protected $hidden = [
        'attendanceid',	'eventId',	'date',	'userId'
    ];

    protected $primaryKey = 'attendanceId';
}
