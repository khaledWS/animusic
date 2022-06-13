<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\composer;
use App\Models\Composer_Album;
use App\Models\Title;
use App\Models\Track;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDO;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('app.albums.index-album');
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
            $composers = composer::all();
            return view('app.albums.createAlbum', compact('titles', 'composers'));
        } catch (\Exception $ex) {
            return  $this->pageError($ex);
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
            DB::beginTransaction();
            $newAlbum = Album::create($collection->except(['composer'])->toArray());
            foreach ($collection['composer'] as $composer) {
                Composer_Album::create([
                    'composer_id' => $composer,
                    'album_id' => $newAlbum->id,
                ]);
            }
            DB::commit();
            return redirect()->route('album.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->pageError($ex);
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
        try {
            return view('app.albums.viewalbum', compact('album'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
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
            $composers = composer::all();
            return view('app.albums.editalbum', compact('album', 'titles', 'composers'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
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
            // dd($collection['date_released'] = date('Y-M-d',strtotime($collection['date_released'] )));
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
            // $collection['date_released'] = date('Y-m-d',strtotime($collection['date_released'] ));
            DB::beginTransaction();
            $album->update($collection->except(['composer'])->toArray());

            if (!$collection->has('composer')) {
                Composer_Album::where([
                    'album_id' => $album->id,
                ])->delete();
            } else {
                foreach ($album->getComposersId() as $currentComp) {

                    if (in_array($currentComp, $collection['composer'])) {
                        continue;
                    } else {
                        Composer_Album::where([
                            'album_id' => $album->id,
                            'composer_id' => $currentComp
                        ])->delete();
                    }
                }
                foreach ($collection['composer'] as $comp) {
                    if (in_array($comp, $album->getComposersId())) {
                        continue;
                    } else {
                        Composer_Album::create([
                            'album_id' => $album->id,
                            'composer_id' => $comp,
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('album.view', $album->id);
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
            return $this->pageError($ex);
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
        try {
            if (Title::where('tid', $album->title_id)->exists() || Track::where('album_id', $album->id)->exists()) {
                throw new Exception('Can not delete which has dependencies');
            };
            $album->delete();
            return redirect()->route('album.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function getRecords()
    {
        try {
            $albums = Album::all();
            return $albums->load('ParentTitle')->toJson();
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
                'album' => 'exists:albums,id'
            ]);
            if ($validator->fails()) {
                return ['result' => '500'];
            }

            $album = album::where('order', $request->order);
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
