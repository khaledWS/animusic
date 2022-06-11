<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{


    protected  $guarded = [];

    // protected $appends = ['title_name'];



    /**
     * getProper Image URI.
     *
     * @return string
     */
    public function getImage()
    {
        return getPhotoPath($this->thumbnail);
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function ParentTitle()
    {
        return $this->belongsTo(Title::class, 'title_id', 'id');
    }

    public function tracks()
    {
        return $this->hasMany(Track::class, 'album_id', 'id')->orderBy('disk')->orderBy('order');
    }

    public function displayFormat()
    {
        return gmdate("H:i:s", $this->album_length);
    }

    public static function getfullOstLength()
    {
        return gmdate("H:i:s", Album::sum('album_length'));
    }

    public function isActive()
    {
        $isActive = $this->active == 1 ? true : false;
        return $isActive;
    }



    public function composer()
    {
        return $this->hasMany(Composer_Album::class, 'album_id', 'id');
    }

    public function getComposers()
    {
        $composers = [];
        foreach ($this->composer()->get() as $comp) {
            $composers[] = $comp->composer->en_name;
        }
        return $composers;
    }

    public function getComposersId()
    {
        $composers = [];
        foreach ($this->composer()->get() as $comp) {
            $composers[] = $comp->composer->id;
        }
        return $composers;
    }


    public function getComposerIdName()
    {
        $composers = [];
        foreach ($this->composer()->get() as $comp) {
            $composers[$comp->composer->id] = $comp->composer->en_name;
        }
        return $composers;
    }


    //     public function getTitleNameAttribute()
    // {
    //     return Title::where('id',  $this->title_id)->first()->title;
    // }

    // public function getComposerNameAttribute()
    // {
    //     return composer::where('id',  $this->composer)->first()->en_name;
    // }
}
