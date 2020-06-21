<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('Story', 'StoryController');
Route::resource('UpStory', 'UpStoryController');

Route::get("listStory", "ListStoryController@show");



Route::delete('deleteStory/{$id}', "storyController@deleteStory");
Route::post('register', 'SpaController@register');
Route::post('login', 'SpaController@login');
Route::post('logout', 'SpaController@logout');
