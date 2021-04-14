<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BaseavtoController;
use App\Http\Controllers\SuperstructureController;
use App\Http\Controllers\AvtofirmController;
use App\Http\Controllers\ProfileController;



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

Route::get('cars/{id}', [CarController::class, 'productinfo'])->name('cars.read');


Route::group(['middleware' => 'auth'], function() {

	Route::group(['middleware' => 'role:admin'], function(){
		Route::get('/pageadmin', [CarController::class, 'pageadmin'])->name('cars.list');
		Route::get('/categories', [CategoryController::class, 'avtocategorylist'])->name('categories.list');
		Route::get('/bases', [BaseavtoController::class, 'baseavtolist'])->name('bases.list');
		Route::get('/superstructures', [SuperstructureController::class, 'superstructurelist'])->name('superstructures.list');
		Route::get('/avtofirms', [AvtofirmController::class, 'avtofirmlist'])->name('avtofirms.list');
	});

	Route::group(['middleware' => 'perm:catalog-update'], function(){
		Route::delete('cars/{id}', [CarController::class, 'deleteCar'])->name('cars.delete');

		Route::get('cars_create', [CarController::class, 'createcar'])->name('cars.create');

		Route::post('cars/create', [CarController::class, 'storecar'])->name('cars.store');

		Route::get('editcars/{id}', [CarController::class, 'editcar'])->name('cars.edit');

		Route::put('cars/{id}', [CarController::class, 'updatecar'])->name('cars.update');

	});



	Route::group(['middleware' => 'perm:goods-add'], function(){
		Route::get('profile_user{id}', [ProfileController::class, 'index'])->name('users.index');
		Route::get('ordersadd/{id}', [ProfileController::class, 'buycar'])->name('users.buy');
		Route::delete('orders/{id}', [ProfileController::class, 'deleteorder'])->name('users.deleteorder');
		Route::get('orders/{id}', [ProfileController::class, 'vieworder'])->name('users.vieworder');
	});

	Route::group(['middleware' => 'perm:dicts-update'], function(){
		Route::get('/categories_create', [CategoryController::class, 'avtocategorycreate'])->name('categories.create');
		Route::post('/categories/create', [CategoryController::class, 'storeavtocategory'])->name('categories.store');
		Route::delete('/categories/{id}', [CategoryController::class, 'deleteavtocategory'])->name('categories.delete');
		Route::get('/editcategories/{id}', [CategoryController::class, 'avtocategoryedit'])->name('categories.edit');
		Route::put('/categories/{id}', [CategoryController::class, 'updateavtocategory'])->name('categories.update');

		Route::get('/bases_create', [BaseavtoController::class, 'baseavtocreate'])->name('bases.create');
		Route::post('/bases/create', [BaseavtoController::class, 'storebaseavto'])->name('bases.store');
		Route::delete('/bases/{id}', [BaseavtoController::class, 'deletebaseavto'])->name('bases.delete');
		Route::get('/editbases/{id}', [BaseavtoController::class, 'baseavtoedit'])->name('bases.edit');
		Route::put('/bases/{id}', [BaseavtoController::class, 'updatebaseavto'])->name('bases.update');

		Route::get('/superstruectures_create', [SuperstructureController::class, 'superstructurecreate'])->name('superstructures.create');
		Route::post('/superstruectures/create', [SuperstructureController::class, 'storesuperstructure'])->name('superstructures.store');
		Route::delete('/superstruectures/{id}', [SuperstructureController::class, 'deletesuperstructure'])->name('superstructures.delete');
		Route::get('/editsuperstruectures/{id}', [SuperstructureController::class, 'superstructureedit'])->name('superstructures.edit');
		Route::put('/superstructures/{id}', [SuperstructureController::class, 'updatesuperstructure'])->name('superstructures.update');

		Route::get('/avtofirms_create', [AvtofirmController::class, 'avtofirmcreate'])->name('avtofirms.create');
		Route::post('/avtofirms/create', [AvtofirmController::class, 'storeavtofirm'])->name('avtofirms.store');
		Route::delete('/avtofirms/{id}', [AvtofirmController::class, 'deleteavtofirm'])->name('avtofirms.delete');
		Route::get('/editavtofirms/{id}', [AvtofirmController::class, 'avtofirmedit'])->name('avtofirms.edit');
		Route::put('/avtofirms/{id}', [AvtofirmController::class, 'updateavtofirm'])->name('avtofirms.update');
	});

});





require __DIR__.'/auth.php';
