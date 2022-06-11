<?php

namespace App\Http\Controllers;

use App\Models\composer;
use App\Http\Requests\StorecomposerRequest;
use App\Http\Requests\UpdatecomposerRequest;

class ComposerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecomposerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecomposerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function show(composer $composer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function edit(composer $composer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecomposerRequest  $request
     * @param  \App\Models\composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecomposerRequest $request, composer $composer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function destroy(composer $composer)
    {
        //
    }
}
