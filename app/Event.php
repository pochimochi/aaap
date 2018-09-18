<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'eventId', 'eventName', 'eventDescription', 'eventCategoryId', 'startDate', 'endDate',  'venue',
        'addressId', 'status', 'isPaid', 'rate', 'created_at', 'updated_at',
        'modifiedBy', 'postedBy'

    ];

    protected $hidden = [
         'created_at', 'updated_at',
    ];
}
