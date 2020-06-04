<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/{any}', 'SpaController@home')->where('any', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('test', function () {
//     return view('test');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('vue', function () {
//     return view('vue');
// });
// Route::get('/kaopiz', function () {
//     return view("kaopiz/test");
// });
Route::post('login', 'SpaController@login');
