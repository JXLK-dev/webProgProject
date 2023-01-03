<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SubPageController;

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
Route::get('/register', [PagesController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerCredential']);
Route::group(['middleware' => ['authentication']], function () {
    Route::get('/home', [PagesController::class, 'Home']);
    Route::get('/home/item_details/{product_id}', [SubPageController::class, 'itemdetails']);
    Route::post('/home/item_details/{product_id}', [CartController::class, 'addItem']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/search', [PagesController::class, 'search']);
    Route::get('/viewcart', [PagesController::class, 'viewcart']);
    Route::get('/history', [PagesController::class, 'history']);
    Route::get('/profile', [PagesController::class, 'profile']);
    Route::get('/additem', [PagesController::class, 'additem']);
    Route::post('/additem', [ItemController::class, 'addItem']);
    Route::get('/editprofile', [PagesController::class, 'editprofile']);
    Route::post('/editprofile', [AuthController::class, 'editprofile']);
    Route::get('/home/{item_id}', [ItemController::class, 'delete']);
    Route::get('/editpassword', [PagesController::class], 'editpassword');
    Route::post('/editpassword', [AuthController::class], 'editpassword');
});
