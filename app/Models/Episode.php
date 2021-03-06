<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;



    protected  $guarded = [];


    public function tracks()
    {
        $x =  $this->belongsToMany(Track::class,'episode_track')->withPivot('episode_track_title','start','end','notes')->orderBy('episode_track.start')->toSql();
        dd($x);
        return $x;
    }

    public function ParentTitle()
    {
        return $this->belongsTo(Title::class,'title_id','id');
    }

    public function isActive()
    {
        $isActive = $this->active == 1 ? true : false;
        return $isActive;
    }

    public function getParentTitle()
    {
        $title = $this->title_id == null ? '' : $this->parentTitle->title;
        return $title;
    }

    public function displayFormat()
    {
        return gmdate("i:s", $this->episode_length);
    }
}
