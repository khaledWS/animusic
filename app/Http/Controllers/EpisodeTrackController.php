<?php

namespace App\Http\Controllers;

use App\Models\EpisodeTrack;
use App\Http\Requests\StoreEpisodeTrackRequest;
use App\Http\Requests\UpdateEpisodeTrackRequest;
use App\Models\Episode;
use App\Models\Track;

class EpisodeTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks = Track::all();
        $episodes = Episode::all();
        return view('createepisodetrack',compact('tracks','episodes'));
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
            $unknown = false;
            $new = false;
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            if($collection->has('unknown')){
                $unknown = true;
                $new = false;
                // $collection-> has('episode_id') ? $collection->forget('episode_id') : '';
                $collection-> has('track_id') ? $collection->forget('track_id') : '';
                $collection['title'] = 'UNKNOWN';
            }
            if($collection->has('new')){
                $new = true;
                // $collection-> has('episode_id') ? $collection->forget('episode_id') : '';
                $collection-> has('track_id') ? $collection->forget('track_id') : '';
                $collection['title'] = 'NEW';
            }
            if(!$collection->has('new') && !$collection->has('unknown')){
                $unknown  = false;
                $new = false;
                $collection['title'] = Track::find($collection['track_id'])->title;
            }
            $collection['new'] = $new;
            $collection['unknown'] = $unknown;
            $time = explode(':',$collection['start']);
            $collection['start'] = (int)$time[0]*60 + (int)$time[1];
            $time = explode(':',$collection['end']);
            $collection['end'] = (int)$time[0]*60 + (int)$time[1];
            EpisodeTrack::create($collection->toArray());
            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
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
        return view('viewepisodetrack', compact('episodeTrack'));
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
            return view('editepisodetrack', compact('tracks', 'episodes','episodeTrack'));
        } catch (\Exception $ex) {
            redirect()->route('episodetrack.index');
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
            if($collection->has('unknown')){
                $collection['unknown'] = true;
                $collection['new'] = false;
                // $collection-> has('episode_id') ? $collection->forget('episode_id') : '';
                $collection-> has('track_id') ? $collection->forget('track_id') : '';
                $collection['title'] = 'UNKNOWN';
            }
            if($collection->has('new')){
                $collection['new'] = true;
                // $collection-> has('episode_id') ? $collection->forget('episode_id') : '';
                $collection-> has('track_id') ? $collection->forget('track_id') : '';
                $collection['title'] = 'NEW';
            }else{
                $collection['unknown'] = false;
                $collection['new'] = false;
                $collection['title'] = Track::find($collection['track_id'])->title;
            }
            $time = explode(':',$collection['start']);
            $collection['start'] = (int)$time[0]*60 + (int)$time[1];
            $time = explode(':',$collection['end']);
            $collection['end'] = (int)$time[0]*60 + (int)$time[1];
            $episodeTrack->update($collection->toArray());
            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
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
            return redirect('/');
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function getAll()
    {
        $episodesTracks = EpisodeTrack::OrderBy('start')->get();
        return  response($episodesTracks->toJson(),200,["Content-Type" => "application/json"]);
    }
}
