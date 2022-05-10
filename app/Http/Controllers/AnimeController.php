<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function album()
    {
        return view('album');
    }
    public function final()
    {
        return view('final');
    }
}
