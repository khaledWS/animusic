<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
