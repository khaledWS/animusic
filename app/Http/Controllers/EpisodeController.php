<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\EpisodeTrack;
use App\Models\Title;
use Exception;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('app.episodes.index-episode');
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
            $titles = Title::all();
            return view('app.episodes.createepisode', compact('titles'));
        } catch (\Exception $ex) {
            return  $this->pageError($ex);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEpisodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEpisodeRequest $request)
    {
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            if (!empty($collection['episode_length'])) {
                $time = explode(':', $collection['episode_length']);
                $collection['episode_length'] = (int)$time[0] * 60 + (int)$time[1];
            }
            Episode::create($collection->toArray());
            return redirect()->route('episode.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        try {
            return view('app.episodes.viewepisode', compact('episode'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        try {
            $titles = Title::all();
            return view('app.episodes.editepisode', compact('titles', 'episode'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEpisodeRequest  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        try {
            $collection = collect($request);
            $collection->forget(['_token']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            if (!empty($collection['episode_length'])) {
                $time = explode(':', $collection['episode_length']);
                $collection['episode_length'] = (int)$time[0] * 60 + (int)$time[1];
            }
            $episode->update($collection->toArray());
            return redirect()->route('episode.view', $episode->id);
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        try {
            if (EpisodeTrack::where('EPISODE_ID', $episode->id)->exists()) {
                throw new Exception('Can not delete which has dependencies');
            };
            $episode->delete();
            return redirect()->route('episode.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function getRecords()
    {
        try {
            $episodes = Episode::all();
            return $episodes->load(['parentTitle'])->toJson();
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }


    private function pageError(Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
