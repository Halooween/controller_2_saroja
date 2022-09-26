<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
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
    return view('welcome');
});

//partial route
Route::resource('page', PageController::class)->only(['index', 'store','update', 'destroy', 'create']);
Route::resource('page', PageController::class)->except(['edit', 'show']);

//nested
Route::group(['middleware'=> ['auth']], function() {
    Route::resource('blog', BlogController::class);
    Route::resource('blog.comment', CommentController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

});

Auth::routes();

