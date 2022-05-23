<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class TrackController extends Controller
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
        $albums = Album::all();
        return view('createtrack', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackRequest $request)
    {
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            $time = explode(':',$collection['length']);
            $collection['length'] = (int)$time[0]*60 + (int)$time[1];

            Track::create($collection->toArray());
            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('viewtrack', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        try {
            $albums = Album::all();
            return view('edittrack', compact('albums', 'track'));
        } catch (\Exception $ex) {
            redirect()->route('track.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackRequest  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            $time = explode(':',$collection['length']);
            $collection['length'] = (int)$time[0]*60 + (int)$time[1];
            $track->update($collection->toArray());
            return redirect()->route('track.view', $track->id);
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        try {
            $track->delete();
            return redirect('/');
        } catch (\Exception $ex) {
            dd($ex);
        }
    }
}
