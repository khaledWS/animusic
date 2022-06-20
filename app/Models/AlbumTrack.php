<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumTrack extends Model
{
    use HasFactory;

    protected $table = 'album_track';



       public function displayFormat()
    {
        return gmdate("H:i:s", $this->album_length);
    }

}
