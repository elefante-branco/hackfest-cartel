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

Auth::routes();

/*
 * Autenticação
 */

Route::group(['namespace' => 'Investigacao'], function () {
    Route::resource('denuncias', 'DenunciaController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['name' => 'Investigacao'], function () {
        Route::resource('contexto', 'ContextoController');
    });
});

Route::get('/', function (){
    return view('dashboard');
});

Route::get('municipios_precos/', 'VisualizacaoController@precoMedio')->name('municipios_precos.show');
Route::get('municipios_precos/{municipio}', 'VisualizacaoController@precoMedioMunicipio')->name('municipio_precos.show');
