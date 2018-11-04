<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
   public function users(){
       return $this->belongsTo('\App\User', 'user_id');
   }

   public const UPDATED_AT = null;
}

