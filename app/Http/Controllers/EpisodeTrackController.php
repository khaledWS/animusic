<?php

namespace App\Http\Controllers;

use App\Models\EpisodeTrack;
use App\Http\Requests\StoreEpisodeTrackRequest;
use App\Http\Requests\UpdateEpisodeTrackRequest;
use App\Models\Episode;
use App\Models\Track;
use Exception;

class EpisodeTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('app.episodes-tracks.index-episodetrack');
        } catch (Exception $ex) {
            return  $this->pageError($ex);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $tracks = Track::all();
            $episodes = Episode::all();
            return view('app.episodes-tracks.createepisodetrack', compact('tracks', 'episodes'));
        } catch (\Exception $ex) {
            return  $this->pageError($ex);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEpisodeTrackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEpisodeTrackRequest $request)
    {
        // return $request;
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            if ($collection->has('status')) {
                switch ($collection['status']) {
                    case 0:
                        $collection['episode_track_title'] = Track::find($collection['track_id'])->title;
                        break;
                    case 1:
                        $collection->forget('track_id');
                        $collection['episode_track_title'] = 'UNKNOWN';
                        break;
                    case 2:
                        $collection->forget('track_id');
                        $collection['episode_track_title'] = 'NEW';
                        break;
                }
            }
            if ($collection->has('type')) {
                switch ($collection['type']) {
                    case 0:
                        break;
                    case 1:
                        $collection['episode_track_title'] = "Opening";
                        break;
                    case 2:
                        $collection['episode_track_title'] = 'Ending';
                        break;
                    case 3:
                        $collection['episode_track_title'] = 'Preview';
                        break;
                    case 4:
                        $collection['episode_track_title'] = 'Mid Card';
                        break;
                    case 5:
                        $collection['episode_track_title'] = 'Title Card';
                        break;
                }
            }

            $time = explode(':', $collection['start']);
            $collection['start'] = (int)$time[0] * 60 + (int)$time[1];
            $time = explode(':', $collection['end']);
            $collection['end'] = (int)$time[0] * 60 + (int)$time[1];
            $new = EpisodeTrack::create($collection->toArray());
            if ($new) {
                return redirect()->route('episodeTrack.index');
            } else {
                throw new Exception('error inserting');
            }
        } catch (\Exception $ex) {
            return  $this->pageError($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EpisodeTrack  $episodeTrack
     * @return \Illuminate\Http\Response
     */
    public function show(EpisodeTrack $episodeTrack)
    {
        try {
            return view('app.episodes-tracks.viewepisodetrack', compact('episodeTrack'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EpisodeTrack  $episodeTrack
     * @return \Illuminate\Http\Response
     */
    public function edit(EpisodeTrack $episodeTrack)
    {
        try {
            $tracks = Track::all();
            $episodes = Episode::all();
            return view('app.episodes-tracks.editepisodetrack', compact('tracks', 'episodes', 'episodeTrack'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEpisodeTrackRequest  $request
     * @param  \App\Models\EpisodeTrack  $episodeTrack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpisodeTrackRequest $request, EpisodeTrack $episodeTrack)
    {
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }

            if ($collection->has('status')) {
                switch ($collection['status']) {
                    case 0:
                        $collection['episode_track_title'] = Track::find($collection['track_id'])->title;
                        break;
                    case 1:
                        $collection->forget('track_id');
                        $collection['episode_track_title'] = 'UNKNOWN';
                        break;
                    case 2:
                        $collection->forget('track_id');
                        $collection['episode_track_title'] = 'NEW';
                        break;
                }
            }
            if ($collection->has('type')) {
                switch ($collection['type']) {
                    case 0:
                        break;
                    case 1:
                        $collection['episode_track_title'] = "Opening";
                        break;
                    case 2:
                        $collection['episode_track_title'] = 'Ending';
                        break;
                    case 3:
                        $collection['episode_track_title'] = 'Preview';
                        break;
                    case 4:
                        $collection['episode_track_title'] = 'Mid Card';
                        break;
                    case 5:
                        $collection['episode_track_title'] = 'Title Card';
                        break;
                }
            }
            $time = explode(':', $collection['start']);
            $collection['start'] = (int)$time[0] * 60 + (int)$time[1];
            $time = explode(':', $collection['end']);
            $collection['end'] = (int)$time[0] * 60 + (int)$time[1];
            $episodeTrack->update($collection->toArray());
            return redirect()->route('episodeTrack.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EpisodeTrack  $episodeTrack
     * @return \Illuminate\Http\Response
     */
    public function destroy(EpisodeTrack $episodeTrack)
    {
        try {
            $episodeTrack->delete();
            return redirect()->route('episodetrack.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function getAll($titleID)
    {
        // $episodeTracks = Episode::where('title_id',5)->get();
        // dd($episodeTracks[0]->tracks);
        try {

            $episodesTracks = EpisodeTrack::where('episode_track.active', 1)->join('episodes', 'episode_id', '=', 'episodes.id')->where('title_id', $titleID)->orderBy('start')->get();
            // $episodesTracks = EpisodeTrack::where('title_id', $titleID)->OrderBy('start')->get();
            // $episodesTracks = EpisodeTrack::OrderBy('start')->episode()->get();
            // dd($episodesTracks);
            return  response($episodesTracks->load(['track'])->toJson(), 200, ["Content-Type" => "application/json"]);
        } catch (\Exception $ex) {
            dd($ex);
            return $this->pageError($ex);
        }
    }

    public function getRecords()
    {
        try {
            $episodesTracks = EpisodeTrack::get();
            return $episodesTracks->load(['episode', 'track'])->toJson();
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    private function pageError(Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
