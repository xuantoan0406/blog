<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\models\Story as ModelsStory;
use Illuminate\Http\Request;
use App\models\Story;
use Illuminate\Support\Facades\DB;

class storyController extends Controller
{
    //
    public function showStory()
    {

        $ls = Story::get();
        return response()->json($ls);
    }
    public function deleteStory($id)
    {

        $story = Story::find($id);

        $story->delete();
        return response([
            'message' => 'success'
        ], 200);
    }
}
