<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;

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

Route::get('/', [CarController::class, 'index']);

Route::get('/index', [CarController::class, 'index']);

Route::get('/catalog', [CarController::class, 'catalog']);

Route::get('/pageadmin', [CarController::class, 'pageadmin']);

Route::get('/productinfo_{id}', [CarController::class, 'productinfo']);