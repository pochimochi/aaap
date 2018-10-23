<?php

namespace App;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EventAttendance extends Model
{
    protected $table = 'event_attendance';

    public $timestamps = false;

    protected $fillable = [
        'id', 'event_id', 'date', 'user_id', 'status'
    ];

    protected $hidden = [
        'id', 'event_id', 'date', 'user_id', 'status'
    ];

    protected $primaryKey = 'id';

    public function event()
    {
        return $this->belongsTo('\App\Event');
    }
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
