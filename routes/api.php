<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'auth','namespace' => 'Api'],function (){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout')->middleware('jwtAuth');

    Route::post('/forgot-password','ForgotController@forgot');
    Route::post('forgot/reset','ForgotController@reset');

    Route::get('login/google', 'AuthController@redirectToProvider');
    Route::get('auth_callback', 'AuthController@handleProviderCallback');

});


Route::group(['prefix'=>'categories','namespace' => 'Api','middleware'=>'jwtAuth'],function (){
    Route::get('/','CategoriesController@categories');
    Route::get('/sub-category','CategoriesController@sub_category');
});


Route::group(['prefix'=>'Courses','namespace' => 'Api','middleware'=>'jwtAuth'],function (){
    Route::get('/','CourseController@index');
    Route::get('/my-courses','CourseController@my_courses');
});
