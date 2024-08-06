<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'search'])->name('home');
Route::get('/post_showDetail/{id}', [HomeController::class, 'post_showDetail'])->name('post_showDetail');
Route::get('/post_category/{id}', [HomeController::class, 'showCategory'])->name('post_category');
// Route::resource('/', HomeController::class) ;


Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/user_info/{id}', [AdminController::class, 'user_info'])->name('user_info');
        Route::get('/user_edit/{id}/edit', [AdminController::class, 'user_edit'])->name('user_edit');
        Route::put('/user_edit/{id}', [AdminController::class, 'user_update'])->name('user_update');
        Route::resource('category', CategoryController::class); //admin
        Route::resource('post', PostController::class);
        Route::resource('tags', TagController::class);
    });
