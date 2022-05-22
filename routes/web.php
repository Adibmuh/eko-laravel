<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::view('/template', 'template');

// Route::view('/', 'welcome');

Route::controller(UserController::class)
    ->group(function () {
        Route::get('/login', 'login')->name("login");
        Route::post('/login', 'doLogin')->name("authenticated");
        Route::post('/logout', 'doLogout')->name("logout");
    });

// Route::group(['controller' => 'App\Http\Controllers\UserController'], function () {
//     Route::get('/login', 'login');
//     Route::post('/Login', 'doLogin');
//     Route::post('/Logout', 'doLogout');
// });