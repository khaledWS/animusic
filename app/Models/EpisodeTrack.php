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
        return $this->hasOne(Episode::class,'id','episode_id');
    }

    public function track()
    {
        return $this->hasOne(Track::class,'id','track_id');
    }

}
