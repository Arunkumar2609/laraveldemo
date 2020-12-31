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
    // return view('welcome');
    return view('auth.login');
});
Route::resource('developers', 'DeveloperController');
// Route::post('multipledelete', 'DeveloperController@multipledelete');
Route::delete('/selected-developers', [App\Http\Controllers\DeveloperController::class,'multipledelete'])->name('deleteselected');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

