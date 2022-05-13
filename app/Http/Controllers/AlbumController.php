<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Title;

class AlbumController extends Controller
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
        try {
            $titles = Title::all();
            return view('createAlbum', compact('titles'));
        } catch (\Exception $ex) {
            redirect()->route('title.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        try {
            $collection = collect($request);
            $image = uploadImage($collection['thumbnail']);
            $collection['thumbnail'] = $image;
            $collection->forget(['_token', 'thumbnail_remove']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            $maxOrder = Album::max('order');
            $collection['order'] = $maxOrder + 1;
            Album::create($collection->toArray());
            return redirect()->back();
        } catch (\Exception $ex) {
            redirect()->route('title.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {

        return view('viewalbum', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        try {
            $titles = Title::all();
            return view('editalbum', compact('album', 'titles'));
        } catch (\Exception $ex) {
            redirect()->route('title.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        try {
            $collection = collect($request);
            if ($collection->has('thumbnail')) {
                $image = uploadImage($collection['thumbnail']);
                $collection['thumbnail'] = $image;
            }
            $collection->forget(['_token', 'thumbnail_remove']);
            if ($collection->has('active')) {
                $collection['active'] = true;
            } else {
                $collection['active'] = false;
            }
            $album->update($collection->toArray());
            return redirect()->route('album.view', $album->id);
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
