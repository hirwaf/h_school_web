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

Route::group(['prefix' => 'v1/auth', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'lecturer', 'middleware' => ['assign.guard:lecturers']], function () {
        Route::post('login', 'LecturersController@login');
        Route::group(['middleware' => 'auth:lecturers'], function () {
            Route::get('logout', 'LecturersController@logout');
            Route::get('/user', function (Request $request) {
                return $request->user();
            });
        });
    });
    Route::group(['prefix' => 'student', 'middleware' => ['assign.guard:students']], function () {
        Route::post('login', 'StudentsController@login');
        Route::group(['middleware' => ['assign.guard:students', 'auth:students']], function () {
            Route::get('logout', 'StudentsController@logout');
            Route::get('/user', "StudentsController@user");
        });
    });
});

Route::group(['prefix' => 'v1/app', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'student', 'middleware' => ['assign.guard:students', 'auth:students']], function () {
        Route::get('/{std_id}/notification', "StudentsController@notification");
        Route::get('/{std_id}/reports', "StudentsController@reports");
        Route::get('/{std_id}/register', "StudentsController@register");
        Route::get('/{std_id}/information', "StudentsController@information");
    });
});
