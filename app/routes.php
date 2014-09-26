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

            Route::post('roles',                            ['uses' => 'RoleController@store',                                         'as' => 'admin.api.v1.roles.store']);

           // Route::post('articles',                         ['uses' => 'ArticleController@store',                                      'as' => 'admin.api.v1.articles.store']);

            Route::put('users/me-update',                   ['uses' => 'UserController@profileUpdate',                                 'as' => 'admin.api.v1.users.profile_update']);

           // Route::put('articles/update',                   ['uses' => 'ArticleController@update',                                     'as' => 'admin.api.v1.articles.update']);

            Route::post('roles',                            ['uses' => 'RoleController@store',                                              'as' => 'admin.api.v1.roles.store']);

            Route::put('users/me-update',                   ['uses' => 'UserController@profileUpdate',                                      'as' => 'admin.api.v1.users.profile_update']);
            Route::post('article_states',                   ['uses' => 'StateController@store',                                             'as' => 'admin.api.v1.article_states.store']);
            Route::put('article_states/{id}',               ['uses' => 'StateController@update',                                            'as' => 'admin.api.v1.article_states.update']);

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
        Route::get('article_states',                        ['uses' => 'StateController@index',                                             'as' => 'admin.article_states.index']);
        Route::get('article_states/create',                 ['uses' => 'StateController@create',                                            'as' => 'admin.article_states.create']);
        Route::post('article_states',                       ['uses' => 'StateController@store',                                             'as' => 'admin.article_states.store']);
        Route::delete('article_states/{id}',                ['uses' => 'StateController@destroy',                                           'as' => 'admin.article_states.destroy']);
        Route::put('article_states/{id}',                   ['uses' => 'StateController@create',                                            'as' => 'admin.article_states.update']);
        Route::get('article_states/{id}/edit',              ['uses' => 'StateController@edit',                                              'as' => 'admin.article_states.edit']);
        Route::get('users/create',                          ['uses' => 'UserController@create',                                             'as' => 'admin.users.create']);
        Route::get('users',                                 ['uses' => 'UserController@index',                                              'as' => 'admin.users.index']);
        Route::get('users/{id}/edit',                       ['uses' => 'UserController@edit',                                               'as' => 'admin.users.edit']);
        Route::post('users',                                ['uses' => 'UserController@store',                                              'as' => 'admin.users.store']);
        Route::put('users/{id}',                            ['uses' => 'UserController@update',                                             'as' => 'admin.users.update']);
        Route::delete('users/{id}',                         ['uses' => 'UserController@destroy',                                            'as' => 'admin.users.destroy']);
    });
    Route::group(['before' => 'guest'], function(){
        Route::post('/login',                               ['uses' => 'AuthController@postLogin',                                          'as' => 'admin.auth.post_login']);
        Route::get('/login',                                ['uses' => 'AuthController@getLogin',                                           'as' => 'admin.auth.get_login']);
    });
});

Route::group(['namespace' => 'Controllers\Admin'],function() {
    Route::post('articles',                             ['uses' => 'ArticleController@store',                                           'as' => 'admin.articles.store']);
    Route::get('/article',                              ['uses' => 'ArticleController@showAll',                                         'as' => 'admin.articles.index']);
    Route::delete('article/{id}',                       ['uses' => 'ArticleController@delete',                                          'as' => 'admin.article.delete']);
    Route::delete('article',                            ['uses' => 'ArticleController@bulkDelete',                                      'as' => 'admin.articles.bulk_delete']);
    Route::put('articles/update',                       ['uses' => 'ArticleController@update',                                          'as' => 'admin.articles.update']);

});
