<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PswcaseController;
use App\Http\Controllers\AuthController;

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
// Route::get('/login', 'AuthController@login');
// Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
// Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth', 'prevent-back-history'], function() {
    Route::get('/dashboard', 'DashboardController@index');  
    
    Route::get('/pswcase', 'PswcaseController@index');
    Route::post('/pswcase/create', 'PswcaseController@create');
    Route::get('/pswcase/{id}/edit', 'PswcaseController@edit');
    Route::post('/pswcase/{id}/update', 'PswcaseController@update');
    Route::get('/pswcase/{id}/delete', 'PswcaseController@delete');
    Route::get('/pswcase/{id}/case', 'PswcaseController@case');
    
    Route::get('/pswiplist', 'PswiplistController@index')->name('pswcase');
    Route::post('/pswiplist/create', 'PswiplistController@create');
    Route::get('/pswiplist/{id}/edit', 'PswiplistController@edit');
    Route::post('/pswiplist/{id}/update', 'PswiplistController@update');
    Route::get('/pswiplist/{id}/delete', 'PswiplistController@delete');
    
});
