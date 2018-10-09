<?php
/**
 * Created by PhpStorm.
 * User: Joyce Sison
 * Date: 22/09/2018
 * Time: 3:27 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementImage extends model
{
    protected $table = 'announcementimages';

    protected $fillable = [
        'image_id', 'announcement_id',
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;

}
