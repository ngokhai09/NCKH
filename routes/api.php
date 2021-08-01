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
Route::post('/register', 'ApiUserController@register');
Route::post('/login', 'ApiUserController@login');
Route::delete('/userdelete/{id}', 'ApiUserController@userDelete')->middleware('auth:api');
Route::get('/user', 'ApiUserController@allUser');
Route::get('/userinfo', 'ApiUserController@userInfo')->middleware('auth:api');
Route::resource('/relics', 'ApiRelicsController')->middleware('auth:api');
Route::resource('/organization', 'ApiOrganizationController')->middleware('auth:api');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
