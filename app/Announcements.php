<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Laravel\Scout\Searchable;


class announcements extends Model
{
//    public function toSearchableArray()
//    {
//        $array = $this->toArray();
//        // Customize array...
//        return $array;
//    }
//
//    use Searchable;
    protected $table = 'announcements';
    protected $fillable = [
        'image_id', 'title', 'description', 'posted_by', 'modified_by', 'type_id', 'status_id', 'due_date', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function image()
    {
        return $this->belongsTo('\App\Images', 'image_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'posted_by');
    }

}
