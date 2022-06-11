<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Episode;
use App\Models\Title;
use App\Models\Track;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        try {
            $tracksSum = Album::sum('number_of_tracks');
            $lengthSum =  Album::getfullOstLength();
            $titles = Title::all();
            $albums = Album::active()->get();
            return view('title', compact('titles', 'albums', 'tracksSum', 'lengthSum'));
        } catch (\Exception $ex) {
            $this->pageError($ex);
        }
    }

    public function album(Album $album)
    {
        try {
            return view('app.anime.showalbum', compact('album'));
        } catch (\Exception $ex) {
            $this->pageError($ex);
        }
    }

    public function title(Title $title)
    {
        try {
            $episodeTitles = collect();
            $title->episodes->each(function($item, $key) use ($episodeTitles) {
                $episodeTitles->push($item->title);
            });
            return view('app.anime.showtitle', compact('title', 'episodeTitles'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }


    public function track(Track $track)
    {
        try {
            // dd();
            // $episodeTitles = collect();
            // $title->episodes->each(function($item, $key) use ($episodeTitles) {
            //     $episodeTitles->push($item->title);
            // });
            return view('app.anime.showtrack', compact('track'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    private function pageError(\Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
