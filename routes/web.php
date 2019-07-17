<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/action_types/bin', 'ActionTypesController@bin');
Route::get('/action_types/bin/{id}', 'ActionTypesController@restore');

Route::resources([
    'posts' => 'PostsController',
    'product_lists' => 'ProductListsController',
    'user_groups' => 'UserGroupsController',
    'categories' => 'CategoriesController',
    'party_lists' => 'PartyListsController',
    'actions' => 'ActionsController',
    'action_types' => 'ActionTypesController',
    'tasks' => 'TasksController',
]);
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


	// Route::get('/action_types', function() {
	//     return view('/admin/action_type/index');
	// });

