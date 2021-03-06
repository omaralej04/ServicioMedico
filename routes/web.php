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

Route::get('/home', 'HomeController@index');

Route::resource('/users', 'UsersController');
Route::get('/miscitas', 'UsersController@miscitasactivas');
Route::get('/miscitasinac', 'UsersController@miscitasinac');
Route::get('/misrecipes', 'UsersController@misrecipes');
Route::get('/misrecipesinac', 'UsersController@misrecipesinac');

Route::get('/users/{id}/historias', 'HistorialesController@userHistoria');
Route::get('/users/{id}/historias/create', 'HistorialesController@historiaCreate');
Route::post('/users/{id}/historias', 'HistorialesController@store');
Route::delete('/historia/{id}', 'HistorialesController@destroy');

Route::get('/historia/{id}/recipe', 'RecipesController@ver_recipe');
Route::get('/historia/{id}/createrecp', 'RecipesController@crearRecipe');
Route::post('/historia/{id}/recipe', 'RecipesController@store');

Route::get('/recipes/all', 'RecipesController@index');
Route::get('/recipes/allinac', 'RecipesController@indexinac');
Route::patch('recipes/{id}', 'RecipesController@updateStatus');
Route::patch('recipes/{id}/res', 'RecipesController@updateStatusT');

Route::resource('/medicos', 'MedicosController');
Route::resource('/farmaceutas', 'FarmaceutasController');
Route::resource('/secretaria', 'SecretariaController');
Route::resource('/medicinas', 'MedicinasController');
Route::resource('/roles', 'RolesController');
Route::resource('/permisos', 'PermissionsController');
Route::resource('/especialidades', 'EspecialidadesController');

Route::resource('/citas', 'CitasController');
Route::get('/citasinac', 'CitasController@indexinac');