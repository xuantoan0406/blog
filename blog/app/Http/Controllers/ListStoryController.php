<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\models\Story;
use App\models\Chaps;
use App\models\ReviewStory;
use Illuminate\Http\Request;

class ListStoryController extends Controller
{
    public function show()
    {

        // $listStories = DB::table('stories')
        //     ->leftJoin('review_stories', 'stories.id', '=', 'review_stories.stories_id')

        //     ->select('review_stories.content', 'stories.*')->get();

        $listStories = Story::paginate(8);
        return response()->json($listStories);
    }
}
