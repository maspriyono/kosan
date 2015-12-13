<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'AuthenticationController@login');
Route::post('login', 'AuthenticationController@loginAction');
Route::get('logout', 'AuthenticationController@logout');

// USER
Route::group(['prefix' => 'user'], function() {
    Route::get('/', 'UserController@index');
    Route::get('new', 'UserController@create');
    Route::post('store', 'UserController@store');
    Route::get('search', 'UserController@search');

    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', 'UserController@show');
        Route::get('edit', 'UserController@edit');
        Route::post('edit', 'UserController@editAction');
        Route::put('update', 'UserController@update');
        Route::delete('delete', 'UserController@destroy');
        Route::delete('removeRole/{roleId}', 'UserController@removeRole');
    });
});

Route::group(['prefix' => 'api'], function() {
    Route::get('GetGraduatesList', 'StudentGraduationController@getGraduatesList');
    Route::get('GetGraduatesForm', 'StudentGraduationController@getGraduatesForm');
});

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'occupant'], function() {
    Route::get('/', 'OccupantController@index');
    Route::get('search', 'OccupantController@search');
    Route::get('show', 'OccupantController@show');
    Route::get('new', 'OccupantController@create');
    Route::post('/', 'OccupantController@store');
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', 'OccupantController@show');
        Route::get('edit', 'OccupantController@edit');
        Route::put('/', 'OccupantController@update');
        Route::delete('/', 'OccupantController@destroy');
    });
});

Route::group(['prefix' => 'transaction'], function() {
    Route::get('/', 'TransactionController@index');
    Route::get('search', 'TransactionController@search');
    Route::get('show', 'TransactionController@show');
    Route::get('new', 'TransactionController@create');
    Route::post('/', 'TransactionController@store');
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', 'TransactionController@show');
        Route::get('edit', 'TransactionController@edit');
        Route::put('/', 'TransactionController@update');
        Route::delete('/', 'TransactionController@destroy');
    });
});


Route::group(['prefix' => 'house'], function() {
    Route::get('/', 'HouseController@index');
    Route::get('new', 'HouseController@create');
    Route::get('search', 'HouseController@search');
    Route::post('/', 'HouseController@store');
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', 'HouseController@show');
        Route::get('edit', 'HouseController@edit');
        Route::put('/', 'HouseController@update');
        Route::delete('/', 'HouseController@destroy');
    });
});

Route::group(['prefix' => 'role'], function() {
    Route::get('/', 'RoleController@index');
    Route::get('search', 'RoleController@search');
    Route::get('show', 'RoleController@show');
    Route::post('/', 'RoleController@store');
    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', 'RoleController@show');
        Route::get('edit', 'RoleController@edit');
        Route::put('/', 'RoleController@update');
        Route::delete('/', 'RoleController@destroy');
    });
});