<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::when('admin/*', 'csrf', ['post']);
Route::pattern('id','[0-9]+');

Route::group(['namespace' => 'Controllers\Admin', 'prefix' => 'admin'],function(){

    Route::group(['before' => 'auth'], function(){

        Route::group([ 'prefix' => 'api/v1', 'namespace' => 'Api\V1'],function(){
            Route::post('roles',                            ['uses' => 'RoleController@store',                                              'as' => 'admin.api.v1.roles.store']);
        });

        Route::get('/dash',                                 ['uses' => 'DashboardController@index',                                         'as' => 'admin.dash.index']);
        Route::get('/logout',                               ['uses' => 'AuthController@getLogout',                                          'as' => 'admin.auth.logout']);
        Route::get('/me',                                   ['uses' => 'UserController@meEdit',                                             'as' => 'admin.profile']);
        Route::get('roles',                                 ['uses' => 'RoleController@index',                                              'as' => 'admin.roles.index']);
        Route::post('roles',                                ['uses' => 'RoleController@store',                                              'as' => 'admin.roles.store']);
        Route::delete('roles/{id}',                         ['uses' => 'RoleController@destroy',                                            'as' => 'admin.roles.delete']);
        Route::delete('roles',                              ['uses' => 'RoleController@bulkDestroy',                                        'as' => 'admin.roles.bulk_delete']);
        Route::get('permissions',                           ['uses' => 'PermissionController@index',                                        'as' => 'admin.permissions.index']);
        Route::put('permissions',                           ['uses' => 'PermissionController@update',                                       'as' => 'admin.permissions.update']);
    });

    Route::group(['before' => 'guest'], function(){
        Route::post('/login',                               ['uses' => 'AuthController@postLogin',                                          'as' => 'admin.auth.post_login']);
        Route::get('/login',                                ['uses' => 'AuthController@getLogin',                                           'as' => 'admin.auth.get_login']);
    });
});

Route::group(['namespace' => 'Controllers\Admin'],function() {
    Route::get('/article', ['uses' => 'ArticleController@showAll', 'as' => 'admin.articles.index']);
});