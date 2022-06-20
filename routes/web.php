<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\EpisodeTrackController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Album;
use App\Models\Episode;
use App\Models\Track;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');






Route::get('/test', function () {


    $abc = 0;
    if (isset($track)) {
        $x = Album::where('title_id',Episode::where('id', 38)->get('title_id')[0]->title_id)->get();
        $b = Track::where('id', $track)->get('album_id');
        foreach ($x as $key => $value) {
            if ($value->id == $b[0]->album_id) {
                $abc = 1;
            }
        }
    }
    dd($abc);
    // $x = App\models\EpisodeTrack::where('track_id', '21')->get();
    // ->where('tracks.title', 'like' ,'進進撃撃st-hrn-egt20130629巨巨人人')
    dd($x);
});
Route::middleware(['auth'])->group(function () {

    /**
     * Titles Routes
     */
    route::get('title/index', [TitleController::class, 'index'])->name('title.new');
    route::get('title/new', [TitleController::class, 'create'])->name('title.new');
    route::post('title/create', [TitleController::class, 'store'])->name('title.create');
    route::get('title/view/{title}', [TitleController::class, 'show'])->name('title.view');
    route::get('/title/edit/{title}', [TitleController::class, 'edit'])->name('title.edit');
    route::post('title/update/{title}', [TitleController::class, 'update'])->name('title.update');
    route::post('title/delete/{title}', [TitleController::class, 'destroy'])->name('title.delete');

    route::get('title/getrecords', [TitleController::class, 'getRecords'])->name('title.getrecords');
    route::post('title/checkorder', [TitleController::class, 'checkOrder'])->name('title.checkorder');

    /**
     * Albums Routes
     */
    route::get('album/index', [AlbumController::class, 'index'])->name('album.index');
    route::get('/album/new', [AlbumController::class, 'create'])->name('album.new');
    route::post('album/create', [AlbumController::class, 'store'])->name('album.create');
    route::get('album/view/{album}', [AlbumController::class, 'show'])->name('album.view');
    route::get('album/edit/{album}', [AlbumController::class, 'edit'])->name('album.edit');
    route::post('album/update/{album}', [AlbumController::class, 'update'])->name('album.update');
    route::post('album/delete/{album}', [AlbumController::class, 'destroy'])->name('album.delete');
    route::get('album/getrecords', [AlbumController::class, 'getRecords'])->name('album.getrecords');
    route::post('album/checkorder', [AlbumController::class, 'checkOrder'])->name('album.checkorder');


    /**
     * Tracks Routes
     */
    route::get('/track/index', [TrackController::class, 'index'])->name('track.index');
    route::get('/track/new', [TrackController::class, 'create'])->name('track.new');
    route::post('/track/create', [TrackController::class, 'store'])->name('track.create');
    route::get('track/view/{track}', [TrackController::class, 'show'])->name('track.view');
    route::get('track/edit/{track}', [TrackController::class, 'edit'])->name('track.edit');
    route::post('track/update/{track}', [TrackController::class, 'update'])->name('track.update');
    route::post('track/delete/{track}', [TrackController::class, 'destroy'])->name('track.delete');
    route::get('track/getrecords', [TrackController::class, 'getRecords'])->name('track.getrecords');
    route::post('track/checkorder', [TrackController::class, 'checkOrder'])->name('track.checkorder');

    /**
     * Episodes Routes
     */
    route::get('/episode/index', [EpisodeController::class, 'index'])->name('episode.index');
    route::get('/episode/new', [EpisodeController::class, 'create'])->name('episode.new');
    route::post('/episode/create', [EpisodeController::class, 'store'])->name('episode.create');
    route::get('episode/view/{episode}', [EpisodeController::class, 'show'])->name('episode.view');
    route::get('episode/edit/{episode}', [EpisodeController::class, 'edit'])->name('episode.edit');
    route::post('episode/update/{episode}', [EpisodeController::class, 'update'])->name('episode.update');
    route::post('episode/delete/{episode}', [EpisodeController::class, 'destroy'])->name('episode.delete');
    route::get('episode/getrecords', [EpisodeController::class, 'getRecords'])->name('episode.getrecords');


    /**
     * Episodes Track Routes
     */
    route::get('/episode/add-track', [EpisodeTrackController::class, 'create'])->name('episode.add-track');
    route::post('/episode/create-track', [EpisodeTrackController::class, 'store'])->name('episode.create-track');


    route::get('episodetrack/index', [EpisodeTrackController::class, 'index'])->name('episodeTrack.index');
    route::get('episodetrack/view/{episodeTrack}', [EpisodeTrackController::class, 'show'])->name('episodeTrack.view');
    route::get('episodetrack/edit/{episodeTrack}', [EpisodeTrackController::class, 'edit'])->name('episodeTrack.edit');
    route::post('episodetrack/update/{episodeTrack}', [EpisodeTrackController::class, 'update'])->name('episodeTrack.update');
    route::post('episodetrack/delete/{EpisodeTrack}', [EpisodeTrackController::class, 'destroy'])->name('episodeTrack.delete');
    route::get('episodetrack/getrecords', [EpisodeTrackController::class, 'getRecords'])->name('episodeTrack.getrecords');
});


Route::get('/', [AnimeController::class, 'index'])->name('title.index');
route::get('title/{title}', [AnimeController::class, 'title'])->name('title.show');
route::get('/album/{album}', [AnimeController::class, 'album'])->name('album.show');
Route::get('/track/{track}', [AnimeController::class, 'track'])->name('track.show');
route::get('/episode/episode-track/{titleID}', [EpisodeTrackController::class, 'getAll'])->name('episode.get-tracks');
Route::get('/track/track-usage/{track}', [TrackController::class, 'trackUsage']);

Route::get('/error', function () {
    return view('error-page');
})->name('error');




require __DIR__ . '/auth.php';
