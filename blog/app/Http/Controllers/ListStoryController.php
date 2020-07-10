<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\models\Story;
use App\models\Chaps;
use App\models\ReviewStory;
use Illuminate\Http\Request;
use App\models\Comment;

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
    public function comment(Request $rq)
    {
        $addComment = Comment::create([
            "stories_id" => $rq->stories_id,
            "post" => $rq->post,
            "user_id" => $rq->user_id,
            "day" => "2020-12-12",
        ]);
        return response()->json($addComment);
    }
    public function category(Request $request)
    {
        // $listStory = $request->category;
        $listStory = Story::where("catelogy", $request->category)->paginate(8);
        return response()->json($listStory);
    }
}
