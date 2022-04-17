<?php

use App\Http\Controllers\app;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
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

Route::get('/', [app::class, 'home']);
Route::get('/login', [app::class, 'login'])->name('login');
Route::post('/login', [userController::class, 'loginUser']);
Route::post('/logout',[userController::class, 'logoutUser']);

Route::get('/register', [app::class, 'register']);
Route::post('/register', [userController::class, 'registUser']);

Route::get('/post', [app::class, 'post'])->middleware('auth');
Route::post('/post',[postController::class, 'post']);

Route::get('/sharedPost',[postController::class, 'sharedPost']);
Route::post('/comment',[postController::class, 'updateComment']);
Route::post('/like',[postController::class, 'like']);

Route::get('/deskripsi', [app::class, 'deskripsi']);

Route::get('/mypost', [app::class, 'myPost']);
Route::post('/delete',[postController::class, 'delete']);

