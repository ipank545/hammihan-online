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
Route::pattern('image', '([^\s]+(\.(?i)(jpg|png|gif|bmp|jpeg|tiff))$)');

Route::group(['namespace' => 'Controllers\Admin', 'prefix' => 'admin'],function(){
    Route::group(['before' => 'auth'], function(){
        Route::group([ 'prefix' => 'api/v1', 'namespace' => 'Api\V1'],function(){
            Route::post('roles',                            ['uses' => 'RoleController@store',                                              'as' => 'admin.api.v1.roles.store']);
            Route::post('articles',                         ['uses' => 'ArticleController@store',                                           'as' => 'admin.api.v1.articles.store']);
            Route::put('users/me-update',                   ['uses' => 'UserController@profileUpdate',                                      'as' => 'admin.api.v1.users.profile_update']);
            Route::post('article_states',                   ['uses' => 'StateController@store',                                             'as' => 'admin.api.v1.article_states.store']);
            Route::put('article_states/{id}',               ['uses' => 'StateController@update',                                            'as' => 'admin.api.v1.article_states.update']);
            Route::post('roles',                            ['uses' => 'RoleController@store',                                         'as' => 'admin.api.v1.roles.store']);

            Route::post('articles',                         ['uses' => 'ArticleController@store',                                      'as' => 'admin.api.v1.articles.store']);

            Route::put('users/me-update',                   ['uses' => 'UserController@profileUpdate',                                 'as' => 'admin.api.v1.users.profile_update']);

            Route::put('articles/update',                   ['uses' => 'ArticleController@update',                                     'as' => 'admin.api.v1.articles.update']);
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
        Route::get('cats',                                  ['uses' => 'CategoryController@index',                                          'as' => 'admin.categories.index']);
        Route::get('cats/create',                           ['uses' => 'CategoryController@create',                                         'as' => 'admin.categories.create']);
        Route::get('cats/{id}/edit',                        ['uses' => 'CategoryController@edit',                                           'as' => 'admin.categories.edit']);
        Route::post('cats',                                 ['uses' => 'CategoryController@store',                                          'as' => 'admin.categories.store']);
        Route::put('cats/{id}',                             ['uses' => 'CategoryController@update',                                         'as' => 'admin.categories.update']);
        Route::delete('cats/{id}',                          ['uses' => 'CategoryController@destroy',                                        'as' => 'admin.categories.destroy']);
        Route::get('articles',                              ['uses' => 'ArticleController@index',                                           'as' => 'admin.articles.index']);
        Route::post('articles',                             ['uses' => 'ArticleController@store',                                           'as' => 'admin.articles.store']);
        Route::get('articles/create',                       ['uses' => 'ArticleController@create',                                          'as' => 'admin.articles.create']);
        Route::get('articles/{id}/edit',                    ['uses' => 'ArticleController@edit',                                            'as' => 'admin.articles.edit']);
        Route::put('articles/{id}',                         ['uses' => 'ArticleController@update',                                          'as' => 'admin.articles.update']);
        Route::delete('articles/{id}',                      ['uses' => 'ArticleController@destroy',                                         'as' => 'admin.articles.destroy']);
        Route::get('role_states',                           ['uses' => 'StateController@getRoleStates',                                     'as' => 'admin.states.edit_role_states']);
        Route::put('role_states',                           ['uses' => 'StateController@putRoleStates',                                     'as' => 'admin.states.update_role_states']);
        Route::get('tags',                                  ['uses' => 'TagController@index',                                               'as' => 'admin.tags.index']);
        Route::put('tags/{id}',                             ['uses' => 'TagController@update']);
    });
    Route::group(['before' => 'guest'], function(){
        Route::post('/login',                               ['uses' => 'AuthController@postLogin',                                          'as' => 'admin.auth.post_login']);
        Route::get('/login',                                ['uses' => 'AuthController@getLogin',                                           'as' => 'admin.auth.get_login']);
    });
});

Route::group(['namespace' => 'Controllers'],function(){
    Route::get('cats/{id}',                                 ['uses' => 'CategoryController@show',                                           'as' => 'categories.show']);
    Route::get('articles/{id}',                             ['uses' => 'ArticleController@show',                                            'as' => 'articles.show']);
    Route::get('/',                                         ['uses' => 'HomeController@index',                                              'as' => 'home']);
    Route::get('{image}',                                   ['uses' => 'ImageController@handleImage',                                       'images.generator']);
});

Route::group(['namespace' => 'Controllers\Admin'],function() {
    Route::get('/article',                              ['uses' => 'ArticleController@showAll',                                         'as' => 'admin.articles.index']);
    Route::delete('article/{id}',                       ['uses' => 'ArticleController@delete',                                          'as' => 'admin.article.delete']);
    Route::delete('article',                            ['uses' => 'ArticleController@bulkDelete',                                        'as' => 'admin.articles.bulk_delete']);

});
