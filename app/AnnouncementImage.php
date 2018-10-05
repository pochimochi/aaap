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
    protected $table = 'announcementImages';

    protected $fillable = [
        'imagesId', 'announcementId',
    ];

    protected $primaryKey = 'announcementImagesId ';

    public $timestamps = false;

}
