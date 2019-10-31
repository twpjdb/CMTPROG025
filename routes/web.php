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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/users', 'UserController@index')->name('user.index');


Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'recipes'     => 'RecipeController',
        'categories'  => 'CategoryController',
        'ingredients' => 'IngredientController'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/profile')->group(function() {
Route::get('/', 'ProfileController@index')->name('profile.show');
Route::get('/edit', 'ProfileController@edit');
Route::patch('/', 'ProfileController@update');
});




