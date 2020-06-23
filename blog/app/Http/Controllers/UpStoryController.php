<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Chaps;

class UpStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listChaps = Chaps::paginate(5);
        return response()->json($listChaps);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = Chaps::create([
            'stories_id' => $request->stories_id,
            'chap' => $request->chap,
            'content' => $request->content,
            'timeUpdate' => $request->timeUpdate,
        ]);

        return response()->json($story);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Chaps::where('stories_id', $id)->paginate(1);
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
        $story = Chaps::find($id);
        $story->chap = $request->chap;
        $story->content = $request->content;
        $story->timeUpdate = $request->timeUpdate;
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
        $story = Chaps::find($id);
        $story->delete();
        return response()->json('delete success');
    }
}
