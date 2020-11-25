<?php

use Illuminate\Support\Facades\Route;

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
    return view('aaa/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Locais
Route::resource('locals', 'LocalController');

// Talhões em Locais
Route::get('/locais/{local_id}/talhaos', [
    'uses' => 'TalhaoController@index',
    'as' => 'talhaos.index'
]);
Route::get('/locais/{local_id}/talhaos/create', [
    'uses' => 'TalhaoController@create',
    'as' => 'talhaos.create'
]);
Route::get('/locais/talhao/{id}/edit', [
    'uses' => 'TalhaoController@edit',
    'as' => 'talhaos.edit'
]);
Route::post('/locais/{local_id}/talhaos/store',[
    'uses' => 'TalhaoController@store',
    'as' => 'talhaos.store'
]);
Route::put('/locais/{local_id}/talhaos/update/{id}',[
    'uses' => 'TalhaoController@update',
    'as' => 'talhaos.update'
]);
Route::delete('/locais/talhao/destroy/{id}',[
    'uses' => 'TalhaoController@destroy',
    'as' => 'talhaos.destroy'
]);

// Analises em Talhões
Route::get('/locais/{local_id}/talhaos/{talhao_id}/analises', [
    'uses' => 'AnaliseController@index',
    'as' => 'analises.index'
]);
Route::get('/locais/{local_id}/talhaos/{talhao_id}/analises/create', [
    'uses' => 'AnaliseController@create',
    'as' => 'analises.create'
]);
Route::get('/locais/talhaos/analise/{id}/edit', [
    'uses' => 'AnaliseController@edit',
    'as' => 'analises.edit'
]);
Route::post('/locais/{local_id}/talhaos/{talhao_id}/analises/store',[
    'uses' => 'AnaliseController@store',
    'as' => 'analises.store'
]);
Route::put('/locais/talhaos/{talhao_id}/analises/update/{id}',[
    'uses' => 'AnaliseController@update',
    'as' => 'analises.update'
]);
Route::delete('/locais/talhaos/analise/destroy/{id}',[
    'uses' => 'AnaliseController@destroy',
    'as' => 'analises.destroy'
]);