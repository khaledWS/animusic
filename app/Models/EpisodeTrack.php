<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class EpisodeTrack extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $table = "episode_track";

    public function episode()
    {
        return $this->hasOne(Episode::class, 'id', 'episode_id');
    }

    public function track()
    {
        return $this->hasOne(Track::class, 'id', 'track_id');
    }

    public function displayFormatStart()
    {
        return gmdate("i:s", $this->start);
    }

    public function displayFormatEnd()
    {
        return gmdate("i:s", $this->end);
    }

    public function typeString()
    {
        $types = [
            0 => 'soundtrack',
            1 => 'Opening',
            2 => 'Ending',
            3 => 'Preview',
            4 => 'Mid card',
        ];

        return $types[$this->type];
    }

    public function statusString()
    {
        $status = [
            0 => 'known',
            1 => 'unknown',
            2 => 'new',
        ];

        return $status[$this->status];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function isActive()
    {
        $isActive = $this->active == 1 ? true : false;
        return $isActive;
    }


    public static function getSeasonData($track_id, $season_id)
    {
        if($season_id == 0){
            $count = DB::select(' SELECT tracks.title, COUNT(episode_track.track_id) as USECOUNT  FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0  AND episode_track.track_id= ? GROUP BY tracks.title ORDER BY COUNT(episode_track.track_id) DESC', [$track_id]);
        $duration = DB::select('SELECT SUM((episode_track.`end` - episode_track.`start`)) AS SUM FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0  AND episode_track.track_id= ? GROUP BY episode_track.track_id ORDER BY SUM desc', [$track_id]);
        }
        else{
        $count = DB::select(' SELECT tracks.title, COUNT(episode_track.track_id) as USECOUNT  FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = ? AND episode_track.track_id= ? GROUP BY tracks.title ORDER BY COUNT(episode_track.track_id) DESC', [$season_id,$track_id]);
        $duration = DB::select('SELECT SUM((episode_track.`end` - episode_track.`start`)) AS SUM FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = ? AND episode_track.track_id= ? GROUP BY episode_track.track_id ORDER BY SUM desc', [$season_id,$track_id]);
        }
        // dd($count,$duration);
        if(!isset($count[0])){
            // dd('reached');
            return null;
        }
        if($duration[0]->SUM == null){
            $duration[0]->SUM = gmdate("i:s", 0);
        }else{
            $duration[0]->SUM = gmdate("i:s", $duration[0]->SUM);
        }
        // dd( [$count, $duration]);
        return [$count, $duration];
    }

    // public static function getSeasonOneData($track_id)
    // {
    //     $count = DB::select(' SELECT tracks.title, COUNT(episode_track.track_id)  FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = 5 AND episode_track.track_id= ? GROUP BY tracks.title ORDER BY COUNT(episode_track.track_id) DESC', [$track_id]);
    //     $duration = DB::select('SELECT SUM((episode_track.`end` - episode_track.`start`)) AS SUM FROM episode_track JOIN episodes ON episode_track.episode_id = episodes.id JOIN tracks ON episode_track.track_id = tracks.id  WHERE episode_track.`type` = 0 AND episode_track.`status` = 0 AND episodes.title_id = 5 AND episode_track.track_id= ? GROUP BY episode_track.track_id ORDER BY SUM desc', [$track_id]);
    //     return [$count, $duration];
    // }
}
