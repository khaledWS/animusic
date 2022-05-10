<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeTrack extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $table = "episode_track";
}
