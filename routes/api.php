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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/sliders','SliderController@indexApi');
Route::get('/comments','CommentController@indexApi');
Route::get('/partners','PartnerController@indexApi');
Route::get('/teams','TeamController@indexApi');
Route::get('/events','EventController@indexApi');
Route::get('/images','PortfolioCategoryController@indexApi');
Route::get('/videos','VideoController@indexApi');