<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Title;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        try {
            $tracksSum = Album::sum('number_of_tracks');
            $lengthSum =  gmdate("H:i:s", Album::sum('album_length'));
            $titles = Title::all();
            $albums = Album::active()->get();
            return view('title', compact('titles', 'albums', 'tracksSum', 'lengthSum'));
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function album(Album $album)
    {
        return view('showalbum',compact('album'));
    }
    public function title(Title $title)
    {
        return view('showtitle',compact('title'));
    }
}
