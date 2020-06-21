<?php

namespace App\Http\Controllers;

use App\models\Story;
use App\models\Chaps;
use Illuminate\Http\Request;

class ListStoryController extends Controller
{
    public function show()
    {
        $listStories = Story::paginate(30);
        return response()->json($listStories);
    }
}
