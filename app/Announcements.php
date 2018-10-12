<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class announcements extends Model
{
    protected $fillable = [
        'image_id', 'title', 'description',  'posted_by', 'modified_by', 'type_id', 'status_id', 'due_date', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function image(){
        return $this->belongsTo('\App\Images', 'image_id');
    }
    public function user(){
        return $this->belongsTo('\App\User', 'posted_by');
    }

}
