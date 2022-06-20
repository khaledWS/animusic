<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    use HasFactory;


    protected  $guarded = [];


    public function album()
    {
        // return $this->belongsTo(Album::class, 'album_id', 'id');
        $x =  $this->belongsToMany(Album::class,'album_track');
        return $x;
        // ddd($x->toSql());
    }

    public function composer()
    {
        return $this->hasOne(composer::class, 'id', 'composer_id');
    }


    public function episodes()
    {
        $x =  $this->belongsToMany(Episode::class,'episode_track');
        return $x;
    }


    public function displayFormat()
    {
        if($this->length == null){
            return gmdate("i:s", 0);
        }
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

    public static function getEpisodesWhereTrackWasUsed($track_id)
    {
        $data = DB::select('SELECT episodes.series_number, episodes.title, episode_track.`start`, episode_track.`end`  FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id WHERE episode_track.track_id = ? ORDER BY episodes.series_number DESC, episode_track.`start` asc',[$track_id]);

        return $data;
    }
}
