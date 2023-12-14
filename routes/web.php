<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtendsController;

Route::get('/products', function () {
    return view('admin.productsIndex', ["title" => "Products"]);
});
Route::get('/feedback/info', function () {
    return view('admin.feedbackIndex', ["title" => "Feedback"]);
});
Route::get('/contactus', function () {
    return view('admin.feedbackContactus', ["title" => "Contact us"]);
});
Route::get('/about', function () {
    return view('aboutus', ["title" => "About us"]);
});
Route::get('/login', function () {
    return view('admin.login', ["title" => "Login"]);
})->name('login');
Route::get('/signup', function () {
    return view('admin.signup', ["title" => "Signup"]);
});
Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ["title" => "Dashboard"]);
    });
});
Route::group(['middleware' => ['auth', 'ceklevel:Customer']], function () {
    Route::get('/', function () {
        return view('admin.ordersIndex', ["title" => "Orders"]);
    });
    Route::get('/transaction', function () {
        return view('admin.transactionsCreate', ["title" => "Transaction"]);
    });
});


Route::group(['prefix' => 'users'], function () {
	Route::get('/', [ExtendsController::class, 'usersIndex']);
	Route::get('/create', [ExtendsController::class, 'usersCreate']);
	Route::post('/create', [ExtendsController::class, 'usersStore']);
	Route::get('/edit/{id}', [ExtendsController::class, 'usersEdit']);
	Route::post('/edit/{id}', [ExtendsController::class, 'usersUpdate']);
	Route::get('/delete/{id}', [ExtendsController::class, 'usersDestroy']);
	Route::get('/myticket', [ExtendsController::class, 'myticket'])->name('admin.myticket'); //Myticket
	Route::get('/onetoone', [ExtendsController::class,'onetooneUsers']);
	Route::get('/onetomany', [ExtendsController::class,'onetomanyUsers']);
	Route::get('/manytomany', [ExtendsController::class,'manytomanyUsers']);
});
Route::post('/postLogin', [ExtendsController::class, 'postLogin']);
Route::get('/logout', [ExtendsController::class, 'logout']);
Route::get('/regis', [ExtendsController::class, 'regis']);
Route::post('/regis', [ExtendsController::class, 'postRegis']);

Route::group(['prefix' => 'products'], function () {
	Route::get('/', [ExtendsController::class, 'productsIndex']);
	Route::get('/create', [ExtendsController::class, 'productsCreate']);
	Route::post('/create', [ExtendsController::class, 'productsStore']);
	Route::get('/edit/{id}', [ExtendsController::class, 'productsEdit']);
	Route::post('/edit/{id}', [ExtendsController::class, 'productsUpdate']);
	Route::get('/delete/{id}', [ExtendsController::class, 'productsDestroy']);
	Route::get('/products', [ExtendsController::class,'productPrint']);
	Route::get('/export_excel', [ExtendsController::class,'productsExportXls']);
	Route::post('/import_excel', [ExtendsController::class,'productsImportXls']);
	Route::get('/dummyEdit', [ExtendsController::class,'productsDummyEdit']);
	Route::get('/dummyUpdate/{id}', [ExtendsController::class,'productsDummyUpdate']);
});
Route::get('/', [ExtendsController::class, 'productsIndex'])->name('products.productsIndex');
Route::get('/{products:name}', [ExtendsController::class, 'show'])->name('products.transactionsCreate');
// Route::get('/', [ExtendsController::class, 'ordersIndex']);



Route::group(['prefix' => 'transactions'], function () {
	Route::get('/', [ExtendsController::class, 'transactionsIndex']);
	Route::get('/create', [ExtendsController::class, 'transactionsCreate']);
	Route::post('/create', [ExtendsController::class, 'transactionsStore']);
	Route::get('/delete/{id}', [ExtendsController::class, 'transactionsDestroy']);
	Route::get('/dummyEdit', [ExtendsController::class,'purchaseDummyEdit']);
	Route::get('/dummyUpdate/{id}', [ExtendsController::class,'purchaseDummyUpdate']);
});



Route::get('/feedback/info', [ExtendsController::class, 'index_feedback']);
Route::get('/contactus', [ExtendsController::class, 'create_transaction']);
Route::post('/contactus', [ExtendsController::class, 'store_transaction']);
Route::get('/dashboard', [ExtendsController::class, 'index_dashboard']);

Route::get('/', function () {return view('admin.homepage');}); //('done.welcome');}); 
Route::get('/parameter/{id}', function ($id) {echo"How are you ? ".$id;});//127.0.0.1:8000/parameter/kamal

Route::group(['prefix' => 'employee'], function () {
	Route::get('/view/{id}', [ExtendsController::class, 'employee_view']);
	Route::get('/edit/{id}',[ExtendsController::class, 'employee_edit']);
	Route::get('/delete/{id}',[ExtendsController::class, 'employee_delete']);
});



Route::group(['prefix' => 'suppliers'], function () {
	Route::get('/dummyEdit', [ExtendsController::class,'suppliers_dummyEdit']);
	Route::get('/dummyUpdate/{id}', [ExtendsController::class,'suppliers_dummyUpdate']);
	Route::get('/delete/{id}', [ExtendsController::class,'suppliers_delete']);
	Route::get('/create', [ExtendsController::class,'suppliers_create']);
	Route::post('/store', [ExtendsController::class,'suppliers_store']);
	Route::get('/recyclebin', [ExtendsController::class,'suppliers_recyclebin']);
	Route::get('/recycle/{id}', [ExtendsController::class,'suppliers_recycle']);
	Route::get('/edit/{id}', [ExtendsController::class,'suppliers_edit']);
	Route::get('/{id}/update', [ExtendsController::class,'suppliers_update']);
	Route::get('/onetooneSuppliers', [ExtendsController::class,'onetoone']);
	Route::get('/onetomanySuppliers', [ExtendsController::class,'onetomany']);
	Route::get('/manytomanySuppliers', [ExtendsController::class,'manytomany']);
});