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

Route::domain('sitcon.iosclub.tw')->group(function () {
    Route::get('/', function () {
        return view('sitcon');
    })->name('sitcon');
});

Route::get('/', function () {
    return view('home')->with(['title'=>'iosclub']);
})->name('home');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('sitcon', function () {
    return view('sitcon');
})->name('sitcon2');

