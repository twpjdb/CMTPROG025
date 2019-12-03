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

Route::any('/search', 'SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/profile')->group(function() {
Route::get('/', 'ProfileController@index')->name('profile.show');
Route::get('/edit', 'ProfileController@edit');
Route::patch('/', 'ProfileController@update');
});

Route::prefix('/admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/recipes', 'AdminRecipeController@Index');
    Route::get('/recipes/create', 'AdminRecipeController@Create');
    Route::post('/recipes', 'AdminRecipeController@Store');
    Route::get('/recipes/{recipe}', 'AdminRecipeController@Show');
    Route::get('/recipes/{recipe}/edit', 'AdminRecipeController@Edit');
    Route::patch('/recipes/{recipe}', 'AdminRecipeController@Update');
    Route::delete('/recipes/{recipe}', 'AdminRecipeController@Destroy');
    

});




