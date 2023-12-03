<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtendsController;

Route::get('/playstations', function () {
    return view('admin.index_playstations', [
        "title" => "Playstations"
    ]);
});

Route::get('/feedback/info', function () {
    return view('feedback.index_feedback', [
        "title" => "Feedback"
    ]);
});

Route::get('/contactus', function () {
    return view('feedback.contactus', [
        "title" => "Contact us"
    ]);
});

Route::get('/about', function () {
    return view('aboutus', [
        "title" => "About us"
    ]);
});

Route::get('/login', function () {
    return view('admin.login', [
        "title" => "Login"
    ]);
})->name('login');

Route::get('/signup', function () {
    return view('admin.signup', [
        "title" => "Signup"
    ]);
});

Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard', [
            "title" => "Dashboard"
        ]);
    });
});

Route::group(['middleware' => ['auth', 'ceklevel:Customer']], function () {

    Route::get('/', function () {
        return view('admin.index_game', [
            "title" => "Movies"
        ]);
    });

    Route::get('/transaction', function () {
        return view('admin.show', [
            "title" => "Transaction"
        ]);
    });
});


Route::group(['prefix' => 'users'], function () {
	Route::get('/', [ExtendsController::class, 'index_user']);
	Route::get('/create', [ExtendsController::class, 'create_user']);
	Route::post('/create', [ExtendsController::class, 'store_user']);
	Route::get('/edit/{id}', [ExtendsController::class, 'edit_user']);
	Route::post('/edit/{id}', [ExtendsController::class, 'update_user']);
	Route::get('/delete/{id}', [ExtendsController::class, 'destroy_user']);
	Route::get('/myticket', [ExtendsController::class, 'myticket'])->name('admin.myticket'); //Myticket
	
	Route::get('/onetooneUsers', [ExtendsController::class,'onetoone']);
	Route::get('/onetomanyUsers', [ExtendsController::class,'onetomany']);
	Route::get('/manytomanyUsers', [ExtendsController::class,'manytomany']);
	
});
Route::post('/postLogin', [ExtendsController::class, 'postLogin']);
Route::get('/logout', [ExtendsController::class, 'logout']);
Route::get('/regis', [ExtendsController::class, 'regis']);
Route::post('/regis', [ExtendsController::class, 'postRegis']);

Route::group(['prefix' => 'playstations'], function () {
	Route::get('/', [ExtendsController::class, 'index_playstations']);
	Route::get('/create', [ExtendsController::class, 'create_playstations']);
	Route::post('/create', [ExtendsController::class, 'store_playstations']);
	Route::get('/edit/{id}', [ExtendsController::class, 'edit_playstations']);
	Route::post('/edit/{id}', [ExtendsController::class, 'update_playstations']);
	Route::get('/delete/{id}', [ExtendsController::class, 'destroy_playstations']);
	Route::get('/playstations', [ExtendsController::class,'playstations']);
	Route::get('/export_excel', [ExtendsController::class,'export_excel']);
	Route::post('/import_excel', [ExtendsController::class,'import_excel']);
	
	Route::get('/playstations', [ExtendsController::class,'playstations']);
	Route::get('/export_excel', [ExtendsController::class,'export_excel']);
	Route::post('/import_excel', [ExtendsController::class,'import_excel']);
});
Route::get('/', [ExtendsController::class, 'index_playstations'])->name('playstations.index_playstations');
Route::get('/{playstations:title}', [ExtendsController::class, 'show'])->name('playstations.show');

Route::group(['prefix' => 'transaction'], function () {
	Route::get('/', [ExtendsController::class, 'index_transaction']);
	Route::get('/create', [ExtendsController::class, 'create_transaction']);
	Route::post('/create', [ExtendsController::class, 'store_transaction']);
	Route::get('/delete/{id}', [ExtendsController::class, 'destroy_transaction']);
});
Route::get('/feedback/info', [ExtendsController::class, 'index_feedback']);
Route::get('/contactus', [ExtendsController::class, 'create_transaction']);
Route::post('/contactus', [ExtendsController::class, 'store_transaction']);
Route::get('/dashboard', [ExtendsController::class, 'index_dashboard']);

Route::get('/', function () {return view('admin.homepage');}); //('done.welcome');}); 
Route::get('/parameter/{id}', function ($id) {echo"How are you ? ".$id;});//127.0.0.1:8000/parameter/kamal
Route::group(['prefix' => 'products'], function () {
	Route::get('/route_cont/{id}',[ExtendsController::class,'barang']);
	Route::get('/edit1', [ExtendsController::class,'products_edit1']);
	Route::get('/delete/{id}', [ExtendsController::class,'products_delete']);
	// 127.0.0.1:8000/products/delete/2
	Route::get('/update/{id}', [ExtendsController::class,'products_update1']);
	// 127.0.0.1:8000/products/update/2
	Route::get('/view', [ExtendsController::class,'products_view']);
	Route::get('/create', [ExtendsController::class,'products_create']);
	Route::post('/store', [ExtendsController::class,'products_store']);
	Route::get('/recyclebin', [ExtendsController::class,'products_recyclebin']);
	Route::get('/recycle/{id}', [ExtendsController::class,'products_recycle']);
	Route::get('/edit/{id}', [ExtendsController::class,'products_edit']);
	Route::post('/{id}/update', [ExtendsController::class,'products_update2']);
});
Route::group(['prefix' => 'employee'], function () {
	Route::get('/view/{id}', [ExtendsController::class, 'employee_view']);
	Route::get('/edit/{id}',[ExtendsController::class, 'employee_edit']);
	Route::get('/delete/{id}',[ExtendsController::class, 'employee_delete']);
});
Route::group(['prefix' => 'suppliers'], function () {
	Route::get('/edit1', [ExtendsController::class,'suppliers_edit1']);
	Route::get('/delete/{id}', [ExtendsController::class,'suppliers_delete']);
	// 127.0.0.1:8000/suppliers/delete/2
	Route::get('/update/{id}', [ExtendsController::class,'suppliers_update']);
	// 127.0.0.1:8000/suppliers/update/2
	Route::get('/view', [ExtendsController::class,'suppliers_view']);
	Route::get('/create', [ExtendsController::class,'suppliers_create']);
	Route::post('/store', [ExtendsController::class,'suppliers_store']);
	Route::get('/recyclebin', [ExtendsController::class,'suppliers_recyclebin']);
	Route::get('/recycle/{id}', [ExtendsController::class,'suppliers_recycle']);
	Route::get('/edit/{id}', [ExtendsController::class,'suppliers_edit']);
	Route::get('/{id}/update', [ExtendsController::class,'suppliers_update2']);
	Route::get('/onetooneSuppliers', [ExtendsController::class,'onetoone']);
	Route::get('/onetomanySuppliers', [ExtendsController::class,'onetomany']);
	Route::get('/manytomanySuppliers', [ExtendsController::class,'manytomany']);
});
Route::group(['prefix' => 'purchase'], function () {
	Route::get('/edit1', [ExtendsController::class,'purchase_edit1']);
	Route::get('/delete/{id}', [ExtendsController::class,'purchase_delete']);
	// 127.0.0.1:8000/purchase/delete/2
	Route::get('/update/{id}', [ExtendsController::class,'purchase_update1']);
	// 127.0.0.1:8000/purchase/update1/2
	Route::get('/view', [ExtendsController::class,'purchase_view']);
	Route::get('/create', [ExtendsController::class,'purchase_create']);
	Route::post('/store', [ExtendsController::class,'purchase_store']);
	Route::get('/recyclebin', [ExtendsController::class,'purchase_recyclebin']);
	Route::get('/recycle/{id}', [ExtendsController::class,'purchase_recycle']);
	Route::get('/edit/{id}', [ExtendsController::class,'purchase_edit']);
	Route::get('/{id}/update', [ExtendsController::class,'purchase_update2']);
});