<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('configuracion/search','App\Http\Controllers\ConfiguracionController@configuracionSearch')->name('configuracion.search');
Route::get('configuracion/searchDebug','App\Http\Controllers\ConfiguracionController@configuracionSearchTalha')->name('configuracion.searchDebug');
Route::post('revisar','App\Http\Controllers\ConfiguracionController@revisar')->name('configuracion.search');
