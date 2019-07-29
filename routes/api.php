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

// Route::post('/login', [
// 	'as' => 'login.login',
// 	'uses'	=> 'Api\Auth\LoginController@login'
// ]);

Route::post('register', [
	'as' => 'register.register',
	'uses' => 'Api\Auth\UserController@register'
]);

Route::post('login', [
	'as' => 'login.authenticate',
	'uses' => 'Api\Auth\UserController@authenticate'
]);

Route::get('open', [
	'as' => 'open.open',
	'uses' => 'Api\DataController@open'
]);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', [
		'as' => 'user.getAuthenticatedUser',
		'uses' => 'Api\Auth\UserController@getAuthenticatedUser'
	]);

    Route::get('closed', [
		'as' => 'closed.closed',
		'uses' => 'Api\DataController@closed'
	]);

    Route::get('logout', [
		'as' => 'logout.logout',
		'uses' => 'Api\Auth\UserController@logout'
	])->name('api.jwt.logout');
});

Route::get('/posts', [
	'as' => 'posts.all',
	'uses' => 'Api\PostsController@all'
]);

Route::get('/posts/self', [
	'as' => 'posts.self',
	'uses' => 'Api\PostsController@self'
]);

// Router for Action Types
Route::get('/action_types', [
	'as' => 'action_types.index',
	'uses' => 'Api\ActionTypesController@index'
]);

Route::post('/action_types/create', [
	'as' => 'action_types.store',
	'uses' => 'Api\ActionTypesController@store'
]);

Route::post('/action_types/{id}/edit', [
	'as' => 'action_types.update',
	'uses' => 'Api\ActionTypesController@update'
]);

Route::post('/action_types/{id}/delete', [
	'as' => 'action_types.destroy',
	'uses' => 'Api\ActionTypesController@destroy'
]);

Route::get('/action_types/bin', [
	'as' => 'action_types.bin',
	'uses' => 'Api\ActionTypesController@bin'
]);

Route::get('/action_types/bin/{id}', [
	'as' => 'action_types.restore',
	'uses' => 'Api\ActionTypesController@restore'
]);
