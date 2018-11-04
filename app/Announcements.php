<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class announcements extends Model
{

    protected $table = 'announcements';
    protected $fillable = [
        'image_id', 'title', 'description', 'remarks', 'posted_by', 'modified_by', 'type_id', 'status', 'due_date', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function image()
    {
        return $this->belongsToMany('\App\Images', 'announcement_images', 'announcement_id', 'image_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'posted_by');
    }

}
