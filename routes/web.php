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


Route::get('/', [TitleController::class, 'index'])->name('title.index');
route::get('/title/new', [TitleController::class, 'create'])->name('title.new');
route::post('title/create', [TitleController::class, 'store'])->name('title.create');
route::get('/album/new', [AlbumController::class, 'create'])->name('album.new');
route::post('album/create', [AlbumController::class, 'store'])->name('album.create');
route::get('/track/new', [TrackController::class, 'create'])->name('track.new');
route::post('/track/create', [TrackController::class, 'store'])->name('track.create');
route::get('/episode/new', [EpisodeController::class, 'create'])->name('episode.new');
route::post('/episode/create', [EpisodeController::class, 'store'])->name('episode.create');
route::get('/episode/add-track', [EpisodeTrackController::class, 'create'])->name('episode.add-track');
route::post('/episode/create-track', [EpisodeTrackController::class, 'store'])->name('episode.create-track');
route::get('/episode/episode-track', [EpisodeTrackController::class, 'getAll'])->name('episode.get-tracks');
route::get('/album/{album}', [AlbumController::class, 'show'])->name('album.show');
route::get('/title/{title}', [TitleController::class, 'show'])->name('title.show');

