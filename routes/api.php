<?php

use Illuminate\Http\Request;

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

Route::get('/gifs/trending', 'GiphyController@getTrendingGifs');
Route::get('/gifs/cache', 'GiphyController@cacheSearchGifs');
Route::get('/gifs/store', 'GiphyController@storeRandomGifs');
Route::get('/gifs/new', 'GiphyController@createNewRandomGifs');
Route::post('/gifs/search', 'GiphyController@searchGifs');
