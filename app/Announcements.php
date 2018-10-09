<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class announcements extends Model
{
    protected $fillable = [
        'title', 'description', 'posted_by', 'modified_by', 'type_id', 'status_id', 'due_date', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;

}
