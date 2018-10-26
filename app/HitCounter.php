<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HitCounter extends Model
{
    protected $table= 'page_counts';
    protected $fillable = [
      'count'
    ];
    public $timestamps = false;
}
