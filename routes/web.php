<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\TitleController;
use App\Models\Album;
use App\Models\Episode;
use App\Models\EpisodeTrack;
use App\Models\Title;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::post('/form',function(Request $request){
    // Title::create(request()->except(['thumbnail_remove','_token','active']));
    // Album::Create(request()->except(['thumbnail_remove','_token','active','title_id']));
    // Episode::Create(request()->except(['_token','active','title_id']));
    // Track::Create(request()->except(['_token','active','album_id']));
    // EpisodeTrack::create(request()->except(['_token','active','track_id','unknown','new']));
    return $request;
});
Route::get('/anime',[AnimeController::class, 'index'])->name('anime');
Route::get('/album',[AnimeController::class, 'album'])->name('album');
Route::get('/final',[AnimeController::class, 'final'])->name('final');
Route::view('/bts','bts');

Route::get('/',[TitleController::class, 'index'])->name('title.index');
route::get('/title/new',[TitleController::class,'create'])->name('title.new');
route::post('title/create',[TitleController::class,'store'])->name('title.create');

// route::view('createtitle','raw.createtitle');
route::view('createalbum','raw.createalbum');
route::view('createtrack','raw.createtrack');
route::view('createepisode','raw.createepisode');
route::view('createepisodetrack','raw.createepisodetrack');

Route::get('/test2',function (){
    $data =  '{
        "data": [{
            "track_name": "Attack on titan ",
            "start_time": "1:25",
            "end_time": "2:00",
            "notes": "dode",
            "number": "1",
            "episode": "1"
        },
        {
            "track_name": "Attack on titan",
            "start_time": "1:25",
            "end_time": "2:00",
            "notes": "dodedodedodedodedodedodedodedodedodedodedodedodedodedode",
            "number": "1",
            "episode": "1"
        },        {
            "track_name": "Attack on titan",
            "start_time": "1:25",
            "end_time": "2:00",
            "notes": "dodedodedodedodedodedodedodedodedodedodedodedodedodedode",
            "number": "1",
            "episode": "1"
        },        {
            "track_name": "Attack on titan",
            "start_time": "1:25",
            "end_time": "2:00",
            "notes": "dodedodedodedodedodedodedodedodedodedodedodedodedodedode",
            "number": "1",
            "episode": "2"
        },        {
            "track_name": "Attack on titan",
            "start_time": "1:25",
            "end_time": "2:00",
            "notes": "dodedodedodedodedodedodedodedodedodedodedodedodedodedode",
            "number": "1",
            "episode": "2"
        }
        ]}';
return response($data,200,["Content-Type" => "application/json"]);
});
