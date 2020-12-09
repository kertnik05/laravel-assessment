<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
Route::patch('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::delete('users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

Route::resource('users', UserController::class);