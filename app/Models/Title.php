<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Episode::class, 'title_id', 'id');
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
}
