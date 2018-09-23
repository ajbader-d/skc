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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/event', 'EventsPageController');
Route::resource('/blog', 'BlogPageController');

Route::post('/comment/store', 'CommentsController@store')->name('comment.add');
Route::post('/reply/store', 'CommentsController@replyStore')->name('reply.add');

Auth::routes();
Route::prefix('manage')->group(function(){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/posts', 'PostController');
	Route::resource('/events', 'EventsController');
	Route::resource('/galleries', 'GalleriesController');
	Route::resource('/dogs', 'DogsController');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
