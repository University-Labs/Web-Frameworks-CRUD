<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BaseavtoController;
use App\Http\Controllers\SuperstructureController;
use App\Http\Controllers\AvtofirmController;


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

Route::get('/productinfo_{id}', [CarController::class, 'productinfo'])->name('cars.read');


Route::group(['middleware' => 'auth'], function() {

	Route::group(['middleware' => 'role:admin'], function(){
		Route::get('/pageadmin', [CarController::class, 'pageadmin'])->name('cars.list');
		Route::get('/avtocategorylist', [CategoryController::class, 'avtocategorylist'])->name('categories.list');
		Route::get('/baseavtolist', [BaseavtoController::class, 'baseavtolist'])->name('bases.list');
		Route::get('/superstructurelist', [SuperstructureController::class, 'superstructurelist'])->name('superstructures.list');
		Route::get('/avtofirmlist', [AvtofirmController::class, 'avtofirmlist'])->name('avtofirms.list');
	});

	Route::delete('/deletecar_{id}', [CarController::class, 'deleteCar'])->name('cars.delete');

	Route::get('createcar', [CarController::class, 'createcar'])->name('cars.create');

	Route::post('createcar', [CarController::class, 'storecar'])->name('cars.store');

	Route::get('editcar_{id}', [CarController::class, 'editcar'])->name('cars.edit');

	Route::post('updatecar_{id}', [CarController::class, 'updatecar'])->name('cars.update');



	Route::get('/avtocategorycreate', [CategoryController::class, 'avtocategorycreate'])->name('categories.create');
	Route::post('/avtocategorycreate', [CategoryController::class, 'storeavtocategory'])->name('categories.store');
	Route::delete('/avtocategorydelete_{id}', [CategoryController::class, 'deleteavtocategory'])->name('categories.delete');
	Route::get('/avtocategoryedit_{id}', [CategoryController::class, 'avtocategoryedit'])->name('categories.edit');
	Route::post('/avtocategoryupdate_{id}', [CategoryController::class, 'updateavtocategory'])->name('categories.update');

	Route::get('/baseavtocreate', [BaseavtoController::class, 'baseavtocreate'])->name('bases.create');
	Route::post('/baseavtocreate', [BaseavtoController::class, 'storebaseavto'])->name('bases.store');
	Route::delete('/baseavtodelete_{id}', [BaseavtoController::class, 'deletebaseavto'])->name('bases.delete');
	Route::get('/baseavtoedit_{id}', [BaseavtoController::class, 'baseavtoedit'])->name('bases.edit');
	Route::post('/baseavtoupdate_{id}', [BaseavtoController::class, 'updatebaseavto'])->name('bases.update');

	Route::get('/superstructurecreate', [SuperstructureController::class, 'superstructurecreate'])->name('superstructures.create');
	Route::post('/superstructurecreate', [SuperstructureController::class, 'storesuperstructure'])->name('superstructures.store');
	Route::delete('/superstructuredelete_{id}', [SuperstructureController::class, 'deletesuperstructure'])->name('superstructures.delete');
	Route::get('/superstructureedit_{id}', [SuperstructureController::class, 'superstructureedit'])->name('superstructures.edit');
	Route::post('/superstructureupdate_{id}', [SuperstructureController::class, 'updatesuperstructure'])->name('superstructures.update');

	Route::get('/avtofirmcreate', [AvtofirmController::class, 'avtofirmcreate'])->name('avtofirms.create');
	Route::post('/avtofirmcreate', [AvtofirmController::class, 'storeavtofirm'])->name('avtofirms.store');
	Route::delete('/avtofirmdelete_{id}', [AvtofirmController::class, 'deleteavtofirm'])->name('avtofirms.delete');
	Route::get('/avtofirmedit_{id}', [AvtofirmController::class, 'avtofirmedit'])->name('avtofirms.edit');
	Route::post('/avtofirmupdate_{id}', [AvtofirmController::class, 'updateavtofirm'])->name('avtofirms.update');

});





require __DIR__.'/auth.php';
