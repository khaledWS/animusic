<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composer_Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "composer_album";


    public function composer()
    {
        return $this->hasOne(composer::class,'id','composer_id');
    }

    public function album()
    {
        return $this->hasOne(Album::class,'id','album_id');
    }
}
