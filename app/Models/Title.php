<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
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

    public function Album()
    {
        return $this->hasMany(Album::class,'title_id','id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class,'title_id','id');
    }

}
