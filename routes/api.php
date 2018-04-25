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

Route::get('/division/{division}', 'DivisionController@apiShow')
  ->name('division.api-show');
Route::get('/division', 'DivisionController@apiIndex')
  ->name('division.api-index');
Route::get('/practical7', 'Practical7@apiIndex')
  ->name('practical7.api-index');
