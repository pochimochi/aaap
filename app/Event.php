<?php

namespace App;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'id', 'name', 'description', 'category_id', 'start_date', 'end_date', 'venue',
        'address_id', 'status', 'paid', 'rate', 'created_at', 'updated_at',
        'modified_by', 'posted_by'

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function attendance()
    {
        return $this->hasMany('\App\EventAttendance', 'event_id');

    }

    public function address()
    {
        return $this->belongsTo('\App\Address');

    }

    public function image()
    {
        return $this->belongsToMany('\App\Images', 'event_images', 'event_id', 'image_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'posted_by');
    }

}
