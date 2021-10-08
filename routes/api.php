<?php

use App\Http\Controllers\masterController;
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



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});
Route::get('user', 'masterController@user');
Route::get('getnots', 'masterController@getNots');
Route::post('markasread/{notId}', 'masterController@markAsRead');

Route::post('createCat', 'Api\CategoryController@createCat');
Route::get('categories', 'Api\CategoryController@index');
Route::get('catPosts/{catName}', 'Api\CategoryController@catPosts');

Route::post('createpost', 'Api\PostController@add');
Route::get('posts', 'Api\PostController@index');
Route::get('post/{slug}', 'Api\PostController@show');
Route::post('/like/{postId}', 'Api\PostController@like');
Route::patch('/editpost/{postSlug}', 'Api\PostController@edit');

Route::get('/profile/{username}', 'Api\UserController@index');
Route::patch('/editProfile/{username}', 'Api\UserController@edit');
Route::post('/follow/{profileId}', 'Api\UserController@follow');
