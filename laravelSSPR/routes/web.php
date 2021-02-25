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

Route::get('/', [CarController::class, 'index'])->name('index');

Route::get('/catalog', [CarController::class, 'catalog'])->name('catalog');

Route::get('/pageadmin', [CarController::class, 'pageadmin'])->name('cars.list');

Route::get('/productinfo_{id}', [CarController::class, 'productinfo'])->name('cars.read');

Route::delete('/deletecar_{id}', [CarController::class, 'deleteCar'])->name('cars.delete');

Route::get('createcar', [CarController::class, 'createcar'])->name('cars.create');

Route::post('createcar', [CarController::class, 'storecar'])->name('cars.store');

Route::get('editcar_{id}', [CarController::class, 'editcar'])->name('cars.edit');

Route::post('updatecar_{id}', [CarController::class, 'updatecar'])->name('cars.update');

Route::delete('erasecar', [CarController::class, 'erasecar']);

Route::get('previewcar_{id}', [CarController::class, 'previewcar']);