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

Route::prefix('v1')->namespace('Api\V1')->group(function() {
    Route::post('reset', 'Auth\ResetPasswordController@reset');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::middleware('auth:api')->group(function() {
    	Route::resource('users', 'UsersController', ['except' => ['show', 'create']]);
    	Route::resource('cycles', 'CyclesController', ['except' => ['show', 'create']]);
    	Route::resource('objectives', 'ObjectivesController');
        Route::resource('teams', 'TeamsController');
        Route::get('dashboard', 'UsersController@dashboard');
    });
});