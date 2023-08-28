<?php

use App\Http\Controllers\API\categoryController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ViewAllController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/home/allrecent',[HomeController::class,'allRecentArtical']);
Route::match(['get','post'],'/home/recent',[HomeController::class,'recentArtical']);
Route::get('/home/allpopular',[HomeController::class,'allpopularArtical']);
Route::match(['get','post'],'/home/popular',[HomeController::class,'showpopularPost']);
Route::get('/home/allpost',[HomeController::class,'allArtical']);
Route::match(['get','post'],'/home/artical',[HomeController::class,'showAllPost']);
Route::match(['get','post'],'/blog/{tagName}/{slug}',[HomeController::class,'showpost']);
Route::match(['get','post'],'/search',[HomeController::class,'search']);
Route::match(['get','post'],'/search-result/{search}',[HomeController::class,'searchResult']);

Route::get('/viewAllpost/{status}',[ViewAllController::class,'viewAll']);
Route::match(['get','post'],'/viewAllpost',[ViewAllController::class,'filterData']);

Route::get('/categories',[categoryController::class,'category']);
// Route::get('/footerCategory',[categoryController::class,'footer_category']);
Route::match(['get','post'],'/categoryPost/{tagName}',[categoryController::class,'categoryPost']);

