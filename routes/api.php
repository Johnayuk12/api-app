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


Route::get('all','PostController@index');

Route::post('createPost','PostController@createPost');

Route::get('getSingle/{id}','PostController@get_single');

Route::patch('updatePost/{id}','PostController@updatePost');

Route::delete('deletePost/{id}','PostController@deletePost');
