<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Episode;
use App\Models\EpisodeTrack;
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
        // dd($title->episodes);
        try {
            $episodeTitles = collect();
            $title->episodes->each(function ($item, $key) use ($episodeTitles) {
                $episodeTitles->push($item->title);
            });
            $data = Title::getSeasonTrackData($title->id);
            return view('app.anime.showtitle', compact('title', 'episodeTitles','data'));
        } catch (\Exception $ex) {
            // dd($ex);
            return $this->pageError($ex);
        }
    }


    public function track(Track $track)
    {
        // dd($track->album->getImage());
        try {
            $seasonOneData = EpisodeTrack::getSeasonData($track->id, 5);
            $seasonTwoData = EpisodeTrack::getSeasonData($track->id, 6);
            $seasonThreePartOneData = EpisodeTrack::getSeasonData($track->id, 7);
            $seasonThreePartTwoData = EpisodeTrack::getSeasonData($track->id, 8);
            $seasonFourPartOneData = EpisodeTrack::getSeasonData($track->id, 9);
            $seasonFourPartTwoData = EpisodeTrack::getSeasonData($track->id, 10);
            $overallData = EpisodeTrack::getSeasonData($track->id, 0);
            // dd($seasonOneData);
            // $seasonTwoData = EpisodeTrack::getSeasonOneData($track->id);
            // $seasonThreeData = EpisodeTrack::getSeasonOneData($track->id);
            // $seasonFourData = EpisodeTrack::getSeasonOneData($track->id);
            // $overallData = EpisodeTrack::getSeasonOneData($track->id);

            return view('app.anime.showtrack', compact('track', 'seasonOneData', 'seasonTwoData', 'seasonThreePartOneData', 'seasonThreePartTwoData', 'seasonFourPartOneData', 'seasonFourPartTwoData', 'overallData'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    private function pageError(\Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
