<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Models\Album;
use App\Models\Episode;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('app.titles.index-title');
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
        //gets the last available order
        try {
            return view('app.titles.createtitle');
        } catch (Exception $ex) {
            return   $this->pageError($ex);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitleRequest $request)
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
            Title::create($collection->toArray());
            return redirect()->route('title.index');
        } catch (Exception $ex) {
            return $this->pageError($ex);
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
        try {
            return view('app.titles.viewtitle', compact('title'));
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {

        try {
            return view('app.titles.edittitle', compact('title'));
        } catch (Exception $ex) {
            return $this->pageError($ex);
        }
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
            $title->update($collection->toArray());
            return redirect()->route('title.view', $title->id);
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        try {
            if(Album::where('title_id', $title->id)->exists() || Episode::where('title_id', $title->id)->exists()){
                throw new Exception('Can not delete which has dependencies');
            };
            $title->delete();
            return redirect()->route('title.index');
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function getRecords()
    {
        try {
            $titles = Title::all();
            return $titles->toJson();
        } catch (\Exception $ex) {
            return $this->pageError($ex);
        }
    }

    public function checkOrder(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order' => 'required|numeric',
                'title' => 'exists:titles,id'
            ]);
            if ($validator->fails()) {
                return ['result' => '500'];
            }

            $title = Title::where('order', $request->order);
            $response = '';
            if (!$title->exists()) {
                $response = ['result' => '1', 'data' => ''];
            } elseif ($title->first()->id == $request->title) {
                $response =  ['result' => '2', 'data' => 'the id belongs to this title'];
            } else {

                $response =  ['result' => '0', 'data' => $title->first()->title];
            }
            return $response;
        } catch (\Exception $ex) {
            return $this->pageError($ex);dd($ex);
        }
    }





    private function pageError(Exception $ex)
    {
        return redirect()->route('error')->withError($ex->getMessage());
    }
}
