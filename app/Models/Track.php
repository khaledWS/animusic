<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;


    protected  $guarded = [];


    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }


    public function displayFormat()
    {
        return gmdate("i:s", $this->length);
    }

    public function isActive()
    {
        $isActive = $this->active == 1 ? true : false;
        return $isActive;
    }

    public function getAlbum()
    {
        $album = $this->album == null ? '' : $this->album->title;
        return $album;
    }
}
