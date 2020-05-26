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

// ---------- Products -----------------
Route::get('/products', 'Products@index')->name('products');
Route::post('/searchProduct', 'Products@searchProduct');
//Route::get('/searchProduct', 'Products@searchProduct');


// ---------- Recipes -----------------
Route::get('/recipes', 'Recipes@index')->name('recipes');
Route::get('/addRecipe', 'Recipes@addRecipe');
Route::post('/createRecipe', 'Recipes@createRecipe');
Route::post('/recipes/addProduct', 'Recipes@addProduct');


// ---------- Categories -----------------
Route::view('/addCategory', 'recipes/categories/add');
Route::post('/addCategory', 'Categories@create');

