<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class announcements extends Model
{
    protected $fillable = [
        'title', 'description', 'postedBy', 'modifiedBy', 'created_at', 'updated_at', 'aTypeId', 'statusId', 'dueDate'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'announcementId';

}
