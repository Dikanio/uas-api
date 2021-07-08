<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;

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

// Articles
Route::get('/', [SiteController::class, 'index'])->name('article-index');
Route::redirect('/articles', '/');
Route::get('/articles/show/{id}', [SiteController::class, 'getArticles'])->name('article-show');

// Auth
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::match(['get', 'post'], '/articles/new', [SiteController::class, 'newArticles'])->name('article-new');
    Route::match(['get', 'put'], '/articles/edit/{id}', [SiteController::class, 'editArticles'])->name('article-edit');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});
