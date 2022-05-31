<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\PswcaseController;

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
    return view('auths.login');
});


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'DashboardController@index');  
    Route::get('/pswcase', 'PswcaseController@index');
    Route::post('/pswcase/create', 'PswcaseController@create');
    Route::get('/pswcase/{id}/edit', 'PswcaseController@edit');
    Route::post('/pswcase/{id}/update', 'PswcaseController@update');
    Route::get('/pswcase/{id}/delete', 'PswcaseController@delete');
    Route::get('/pswcase/{id}/case', 'PswcaseController@case');
    
});
