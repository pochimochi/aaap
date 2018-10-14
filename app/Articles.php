<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Articles extends Model
{
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    use Searchable;
    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'created_at', 'updated_at', 'posted_by', 'modified_by', 'status_id',
        'articletype_id',

    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function user(){
        return $this->belongsTo('\App\User', 'posted_by');
    }
}
