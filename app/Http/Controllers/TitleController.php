<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::all();
        return view('title',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createtitle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitleRequest $request)
    {
        try{
            $collection = collect($request);
            $image = uploadImage($collection['thumbnail']);
            $collection['thumbnail'] = $image;
            $collection->forget(['_token','thumbnail_remove']);
            if($collection->has('active')){
              $collection['active'] = true;
            }
            else{
                $collection['active'] = false;
            }
            $maxOrder = Title::max('order');
            $collection['order'] = $maxOrder+1;
            Title::create($collection->toArray());
           return redirect()->back();
        }catch(\Exception $ex){
            dd($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTitleRequest  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitleRequest $request, Title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
    }
}
