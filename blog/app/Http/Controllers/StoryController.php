<?php

namespace App\Http\Controllers;

use App\models\Chaps;
use App\models\Story;
use \App\models\ReviewStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listStories = Story::paginate(4);
        return response()->json($listStories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nameImg = $request->file->getClientOriginalName();
        $request->file->move(public_path('imgs'), $nameImg);
        $addStory = Story::create([
            "nameStory" => $request->nameStory,
            "author" => $request->author,
            "chap" => $request->chap,
            "status" => $request->status,
            "catelogy" => $request->catelogy,
            "timeUpdate" => $request->timeUpdate,
            "review" => $request->review,
            "img" => $nameImg
        ]);

        return response()->json($addStory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $story = Story::find($id);
        return response()->json($story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $story = Story::find($id);
        $story->nameStory = $request->nameStory;
        $story->author = $request->author;
        $story->chap = $request->chap;
        $story->status = $request->status;
        $story->timeUpdate = $request->timeUpdate;
        $story->catelogy = $request->catelogy;
        $story->img = $request->img;
        $story->save();


        return response()->json($story);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();
        return response()->json('delete success');
    }
}
