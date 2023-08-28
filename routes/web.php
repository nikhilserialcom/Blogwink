<?php

use App\Http\Controllers\BlogController;
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

Route::get('/',[BlogController::class,'index'])->name('user.name');
Route::get('/blog',[BlogController::class,'showblog'])->name('user.blog');
Route::get('/viewArtical',[BlogController::class,'viewAll'])->name('user.viewAll');
Route::get('/category',[BlogController::class,'category'])->name('user.category');
