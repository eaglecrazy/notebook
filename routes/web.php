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

Auth::routes();
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::group([
    'middleware' => ['auth'],
], function(){
    Route::resource('contacts', 'ContactController');
    Route::put('/contacts/{contact}/favorite', 'ContactController@toggleFavoritedState')->name('favorite');
});
