<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;


    protected  $guarded = [];



        /**
     * getProper Image URI.
     *
     * @return string
     */
    public function getImage()
    {
        return getPhotoPath($this->thumbnail);
    }

    public function scopeActive($query){
        $query->where('active', 1);
    }

    public function ParentTitle()
    {
        return $this->belongsTo(Title::class,'title_id','id');
    }

    public function tracks()
    {
        return $this->hasMany(Track::class,'album_id','id')->orderBy('order');
    }

    public function displayFormat()
    {
        return gmdate("H:i:s", $this->album_length);
    }

    public function isActive()
    {
        $isActive = $this->active == 1? true : false;
        return $isActive;
    }
}
