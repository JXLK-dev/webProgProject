<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/signin', [PagesController::class, 'signIn']);
Route::post('/signin', [AuthController::class, 'loginCredential']);
Route::get('/home', [PagesController::class, 'Home'])->middleware('rolecheck');
Route::get('/register', [PagesController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerCredential']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/search', [PagesController::class, 'search']);
Route::get('/cart', [PagesController::class, 'cart']);
Route::get('/history', [PagesController::class, 'history']);
Route::get('/profile', [PagesController::class, 'profile']);
Route::get('/additem', [PagesController::class, 'additem']);
