<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PublicController;
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

/**
 * public route
 */
Route::middleware('guest')->group(function () {

    Route::get('/', [PublicController::class, 'index'])->name('root');

});


Auth::routes();

/**
 * after authenticate
 */
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/blog-create', [BlogController::class, 'store'])->name('blog.create');

});
