<?php
/**
 * Created by PhpStorm.
 * User: IanRenj
 * Date: 20/11/2018
 * Time: 3:47 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';

    public $timestamps = false;

    protected $fillable = [
        'name'

    ];

    protected $hidden = [

    ];
    public function address()
    {
        return $this->hasOne('\App\Address');
    }
}
