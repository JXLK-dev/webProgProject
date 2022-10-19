<?php

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
Route::post('/signin', [PagesController::class, 'loginCredential']);
Route::get('/home', [PagesController::class, 'Home']);
Route::get('/register', [PagesController::class, 'register']);
Route::post('/register', [PagesController::class, 'registerCredential']);
