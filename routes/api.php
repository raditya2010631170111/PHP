<?php

use App\Http\Controllers\MovieApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'playstations'], function () {
	Route::get('/edit1', [PlaystationsController::class,'playstations_edit1']);
	Route::get('/delete/{id}', [PlaystationsController::class,'playstations_delete']);
	// 127.0.0.1:8000/playstations/delete/2
	Route::get('/update/{id}', [PlaystationsController::class,'playstations_update1']);
	// 127.0.0.1:8000/playstations/update1/2
	Route::get('/view', [PlaystationsController::class,'playstations_view']);
	Route::get('/create', [PlaystationsController::class,'playstations_create']);
	Route::post('/store', [PlaystationsController::class,'playstations_store']);
	Route::get('/recyclebin', [PlaystationsController::class,'playstations_recyclebin']);
	Route::get('/recycle/{id}', [PlaystationsController::class,'playstations_recycle']);
	// 127.0.0.1:8000/playstations/recycle/2
	Route::get('/edit2/{id}', [PlaystationsController::class,'playstations_edit2']);
	// 127.0.0.1:8000/playstations/edit2/2
	Route::get('/{id}/update', [PlaystationsController::class,'playstations_update2']);
	// 127.0.0.1:8000/playstations/2/update2
});
Route::group(['prefix' => 'users'], function () {
	Route::get('/edit', [PlaystationsController::class,'users_edit']);
	Route::get('/delete/{id}', [PlaystationsController::class,'users_delete']);
	// 127.0.0.1:8000/users/delete/2
	Route::get('/update/{id}', [PlaystationsController::class,'users_update']);
	// 127.0.0.1:8000/users/update/2
	Route::get('/view', [PlaystationsController::class,'users_view']);
	Route::get('/create', [PlaystationsController::class,'users_create']);
	Route::post('/store', [PlaystationsController::class,'users_store']);
	Route::get('/recyclebin', [PlaystationsController::class,'users_recyclebin']);
	Route::get('/recycle/{id}', [PlaystationsController::class,'users_recycle']);
	// 127.0.0.1:8000/users/recycle/2
	Route::get('/edit2/{id}', [PlaystationsController::class,'users_edit2']);
	// 127.0.0.1:8000/users/edit2/2
	Route::get('/{id}/update', [PlaystationsController::class,'users_update2']);
	// 127.0.0.1:8000/users/2/update2
	Route::get('/onetoone', [PlaystationsController::class,'onetoone']);
	Route::get('/onetomany', [PlaystationsController::class,'onetomany']);
	Route::get('/manytomany', [PlaystationsController::class,'manytomany']);
});
Route::group(['prefix' => 'purchases'], function () {
	Route::get('/edit1', [PlaystationsController::class,'purchases_edit1']);
	Route::get('/delete/{id}', [PlaystationsController::class,'purchases_delete']);
	// 127.0.0.1:8000/purchases/delete/2
	Route::get('/update/{id}', [PlaystationsController::class,'purchases_update1']);
	// 127.0.0.1:8000/purchases/update1/2
	Route::get('/view', [PlaystationsController::class,'purchases_view']);
	Route::get('/create', [PlaystationsController::class,'purchases_create']);
	Route::post('/store', [PlaystationsController::class,'purchases_store']);
	Route::get('/recyclebin', [PlaystationsController::class,'purchases_recyclebin']);
	Route::get('/recycle/{id}', [PlaystationsController::class,'purchases_recycle']);
	// 127.0.0.1:8000/purchases/recycle/2
	Route::get('/edit2/{id}', [PlaystationsController::class,'purchases_edit2']);
	// 127.0.0.1:8000/purchases/edit2/2
	Route::get('/{id}/update', [PlaystationsController::class,'purchases_update2']);
	// 127.0.0.1:8000/purchases/2/update2
});

Route::post('/movies', [MovieApiController::class, 'create']);

Route::group(['prefix' => 'products'], function () {
	Route::get('/route_cont/{id}',[ExtendsController::class,'barang']);
	Route::get('/edit1', [ExtendsController::class,'products_edit1']);
	Route::get('/delete/{id}', [ExtendsController::class,'products_delete']);
	// 127.0.0.1:8000/products/delete/2
	Route::get('/update/{id}', [ExtendsController::class,'products_update1']);
	// 127.0.0.1:8000/products/update1/2
	Route::get('/view', [ExtendsController::class,'products_view']);
	Route::get('/create', [ExtendsController::class,'products_create']);
	Route::post('/store', [ExtendsController::class,'products_store']);
	Route::get('/recyclebin', [ExtendsController::class,'products_recyclebin']);
	Route::get('/recycle/{id}', [ExtendsController::class,'products_recycle']);
	// 127.0.0.1:8000/products/recycle/2
	Route::get('/edit2/{id}', [ExtendsController::class,'products_edit2']);
	// 127.0.0.1:8000/products/edit2/2
	Route::get('/{id}/update', [ExtendsController::class,'products_update2']);
	// 127.0.0.1:8000/products/2/update2
});
Route::group(['prefix' => 'suppliers'], function () {
	Route::get('/edit', [ExtendsController::class,'suppliers_edit']);
	Route::get('/delete/{id}', [ExtendsController::class,'suppliers_delete']);
	// 127.0.0.1:8000/suppliers/delete/2
	Route::get('/update/{id}', [ExtendsController::class,'suppliers_update']);
	// 127.0.0.1:8000/suppliers/update/2
	Route::get('/view', [ExtendsController::class,'suppliers_view']);
	Route::get('/create', [ExtendsController::class,'suppliers_create']);
	Route::post('/store', [ExtendsController::class,'suppliers_store']);
	Route::get('/pagination', [ExtendsController::class,'pagination']);
	Route::get('/recycle/{id}', [ExtendsController::class,'recycle']);
	Route::get('/recyclebin', [ExtendsController::class,'recyclebin']);
	Route::get('/restore/{id}', [ExtendsController::class,'restore']);
	Route::get('/restore_all', [ExtendsController::class,'restore_all']);
	Route::get('/erase/{id}', [ExtendsController::class,'erase']);
	Route::get('/erase_all', [ExtendsController::class,'erase_all']);
	Route::get('/onetoone', [ExtendsController::class,'onetoone']);
	Route::get('/onetomany', [ExtendsController::class,'onetomany']);
	Route::get('/manytomany', [ExtendsController::class,'manytomany']);
});