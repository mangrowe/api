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

    Route::middleware(['auth:api', 'logs'])->group(function() {
        Route::post('settings/restores', 'SettingsController@restores');
        Route::post('settings/downloader', 'SettingsController@downloader');
        Route::post('settings/backups', 'SettingsController@backups');
        Route::post('objectives/cloner/{id}', 'ObjectivesController@cloner');
        
        Route::get('objectives/dashboard', 'ObjectivesController@dashboard');
        Route::get('tags/{id}', 'TagsController@show');
        Route::get('tags', 'TagsController@index');
        Route::get('pages', 'PagesController@index');
        Route::get('departments/tree', 'DepartmentsController@tree');
        Route::get('users/profile', 'UsersController@profile');
        Route::get('dashboard', 'UsersController@dashboard');
        
        Route::resource('settings', 'SettingsController', ['except' => ['show', 'create']]);
        Route::resource('departments', 'DepartmentsController');
        Route::resource('checkIns', 'CheckInsController');
        Route::resource('keyResults', 'KeyResultsController');
		Route::resource('organizations', 'OrganizationsController', ['except' => ['show', 'create']]);
    	Route::resource('users', 'UsersController', ['except' => ['show', 'create']]);
    	Route::resource('cycles', 'CyclesController');
    	Route::resource('objectives', 'ObjectivesController');
        Route::resource('teams', 'TeamsController');        
    });
});