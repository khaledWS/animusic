<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Title extends Model
{

    protected  $guarded = [];


    /**
     * get Full Image URI.
     *
     * @return string
     */
    public function getImage()
    {
        return getPhotoPath($this->thumbnail);
    }


    /**
     * Album hasMany Relationship
     *
     * @return void
     */
    public function Album()
    {
        return $this->hasMany(Album::class, 'title_id', 'id');
    }

    /**
     * episodes hasMany Relationship
     *
     * @return void
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class, 'title_id', 'id')->orderBy('season_number');
    }

    /**
     * checks if title is active
     *
     * @return bool
     */
    public function isActive()
    {
        $isActive = $this->active == 1 ? true : false;
        return $isActive;
    }


    public static function getSeasonTrackData($season_id)
    {
        $usage = DB::select('SELECT  tracks.title, COUNT(episode_track.track_id) AS USECOUNT  FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = ?  GROUP BY tracks.title ORDER BY COUNT(episode_track.track_id) DESC LIMIT 1',[$season_id]);
        $duration = DB::select('SELECT tracks.title,  SUM((episode_track.`end` - episode_track.`start`)) AS SUM FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = ?  GROUP BY episode_track.track_id ORDER BY SUM DESC LIMIT 1',[$season_id]);
        if(!isset($usage[0])){
            // dd('reached');
            return null;
        }
        if($duration[0]->SUM == null){
            $duration[0]->SUM = gmdate("i:s", 0);
        }else{
            $duration[0]->SUM = gmdate("i:s", $duration[0]->SUM);
        }
        // dd( [$count, $duration]);
        return [$usage, $duration];
    }
}
