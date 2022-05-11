<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;



    protected  $guarded = [];



    public function ParentTitle()
    {
        return $this->belongsTo(Title::class,'title_id','id');
    }
}
