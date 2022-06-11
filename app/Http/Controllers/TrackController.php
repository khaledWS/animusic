<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Album;
use App\Models\composer;
use App\Models\EpisodeTrack;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('app.tracks.index-track');
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
            $albums = Album::all();
            $composers = composer::all();
            return view('app.tracks.createtrack', compact('albums', 'composers'));
        } catch (\Exception $ex) {
            return  $this->pageError($ex);
        }
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
            if(!empty($collection['length'])){
             $time = explode(':',$collection['length']);
            $collection['length'] = (int)$time[0]*60 + (int)$time[1];
            }
            Track::create($collection->toArray());
            return redirect()->route('track.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
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
        try {
            return view('app.tracks.viewtrack', compact('track'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
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
            $composers = composer::all();
            return view('app.tracks.edittrack', compact('albums', 'track','composers'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
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
            return $this->pageError($ex);
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
            if (EpisodeTrack::where('track_id', $track->id)->exists()) {
                throw new Exception('Can not delete which has dependencies');
            };
            $track->delete();
            return redirect()->route('track.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function getRecords()
    {
        try {
            $tracks = Track::all();
            return $tracks->load(['album','composer' ])->toJson();
        } catch (\Exception $ex) {
            ddd($ex);
            return $this->pageError($ex);
        }
    }

    public function checkOrder(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order' => 'required|numeric',
                'track' => 'exists:tracks,id',
                'disk' => 'numeric',
            ]);
            if ($validator->fails()) {
                return ['result' => '500'];
            }

            $album = Track::where('order', $request->order)->where('disk', $request->disk);
            dd($album->get());
            $response = '';
            if (!$album->exists()) {
                $response = ['result' => '1', 'data' => ''];
            } else if ($album->first()->id == $request->album) {
                $response =  ['result' => '2', 'data' => 'the id belongs to this album'];
            } else {

                $response =  ['result' => '0', 'data' => $album->first()->title];
            }
            return $response;
        } catch (\Exception $ex) {
            return $this->pageError($ex);
            dd($ex);
        }
    }





    private function pageError(Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
