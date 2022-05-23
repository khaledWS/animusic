<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\EpisodeTrackController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TrackController;
use App\Models\Album;
use App\Models\Episode;
use App\Models\EpisodeTrack;
use App\Models\Title;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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







Route::middleware(['auth'])->group(function () {

    /**
     * Titles Routes
     */
    route::get('title/new', [TitleController::class, 'create'])->name('title.new');
    route::post('title/create', [TitleController::class, 'store'])->name('title.create');
    route::get('title/view/{title}', [TitleController::class, 'show'])->name('title.view');
    route::get('/title/edit/{title}', [TitleController::class, 'edit'])->name('title.edit');
    route::post('title/update/{title}', [TitleController::class, 'update'])->name('title.update');
    route::post('title/delete/{title}', [TitleController::class, 'destroy'])->name('title.delete');

    /**
     * Albums Routes
     */
    route::get('/album/new', [AlbumController::class, 'create'])->name('album.new');
    route::post('album/create', [AlbumController::class, 'store'])->name('album.create');
    route::get('album/view/{album}', [AlbumController::class, 'show'])->name('album.view');
    route::get('album/edit/{album}', [AlbumController::class, 'edit'])->name('album.edit');
    route::post('album/update/{album}', [AlbumController::class, 'update'])->name('album.update');
    route::post('album/delete/{album}', [AlbumController::class, 'destroy'])->name('album.delete');

    /**
     * Tracks Routes
     */
    route::get('/track/new', [TrackController::class, 'create'])->name('track.new');
    route::post('/track/create', [TrackController::class, 'store'])->name('track.create');
    route::get('track/view/{track}', [TrackController::class, 'show'])->name('track.view');
    route::get('track/edit/{track}', [TrackController::class, 'edit'])->name('track.edit');
    route::post('track/update/{track}', [TrackController::class, 'update'])->name('track.update');
    route::post('track/delete/{track}', [TrackController::class, 'destroy'])->name('track.delete');

    /**
     * Episodes Routes
     */
    route::get('/episode/new', [EpisodeController::class, 'create'])->name('episode.new');
    route::post('/episode/create', [EpisodeController::class, 'store'])->name('episode.create');
    route::get('episode/view/{episode}', [EpisodeController::class, 'show'])->name('episode.view');
    route::get('episode/edit/{episode}', [EpisodeController::class, 'edit'])->name('episode.edit');
    route::post('episode/update/{episode}', [EpisodeController::class, 'update'])->name('episode.update');
    route::post('episode/delete/{episode}', [EpisodeController::class, 'destroy'])->name('episode.delete');



    /**
     * Episodes Track Routes
     */
    route::get('/episode/add-track', [EpisodeTrackController::class, 'create'])->name('episode.add-track');
    route::post('/episode/create-track', [EpisodeTrackController::class, 'store'])->name('episode.create-track');
    route::get('episodetrack/view/{episodeTrack}', [EpisodeTrackController::class, 'show'])->name('episodeTrack.view');
    route::get('episodetrack/edit/{episodeTrack}', [EpisodeTrackController::class, 'edit'])->name('episodeTrack.edit');
    route::post('episodetrack/update/{episodeTrack}', [EpisodeTrackController::class, 'update'])->name('episodeTrack.update');
    route::post('episodetrack/delete/{EpisodeTrack}', [EpisodeTrackController::class, 'destroy'])->name('episodeTrack.delete');


});


Route::get('/', [AnimeController::class, 'index'])->name('title.index');
route::get('title/{title}', [AnimeController::class, 'title'])->name('title.show');
route::get('/album/{album}', [AnimeController::class, 'album'])->name('album.show');
route::get('/episode/episode-track', [EpisodeTrackController::class, 'getAll'])->name('episode.get-tracks');





require __DIR__ . '/auth.php';
