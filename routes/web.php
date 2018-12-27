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
/*
|--------------------------------------------------------------------------
| Internas do Laravel
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'laravel'], function () {
    
    Route::group(['prefix' => 'artisan'], function () {

        Route::get('/migrate', function () {
            \Illuminate\Support\Facades\Artisan::call('migrate');

            return redirect()->route('index')->with('mensagem', 'Comando MIGRATE executado com sucesso!');
        });

    });
});

Route::get('/', 'IndexController@index')->name('index');

Route::get('/buscar', 'IndexController@processa_crawler')->name('buscar');
