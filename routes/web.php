<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPicturesController;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Auth::routes();

Route::get('/home', [AdminController::class, 'home'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('update', [AdminController::class, 'index_update'])->name('admin_update');
    Route::get('icons', [AdminController::class, 'iconsUpdate'])->name('icons');
    Route::resource('pictures', AdminPicturesController::class);
    Route::get('users', [AdminUserController::class, 'index'])->name('users');
    Route::post('users', [AdminUserController::class, 'post'])->name('users_update');
    Route::delete('users', [AdminUserController::class, 'delete'])->name('users_delete');
});



