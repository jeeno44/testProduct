<?php

use Illuminate\Support\Facades\Route;
//use LoginController

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

Route::middleware("auth")->get('/', [\App\Http\Controllers\IndexController::class,"index"]);

Route::middleware(["auth","admin"])->match(['get','post'],'/add', [\App\Http\Controllers\IndexController::class,"add"]);

Route::middleware(["auth","admin"])->match(['get','post'],'/edit/{id}', [\App\Http\Controllers\IndexController::class,"edit"]);

Route::middleware(["auth","admin"])->get('/del/{id}', [\App\Http\Controllers\IndexController::class,"del"]);

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,"logout"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
