<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DesktopController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Desktop;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [HomeController::class, 'master'])->name('master');


//User
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/users/delete/{user_id}', [UserController::class, 'users_delete'])->name('users.delete');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/name/change', [UserController::class, 'name_change'])->name('name.change');
Route::post('/password/change', [UserController::class, 'password_change'])->name('password.change');


//Category
Route::get('/department', [CategoryController::class, 'department'])->name('department');
Route::post('/department/store', [CategoryController::class, 'department_store'])->name('department.store');
Route::get('/department/delete/{department_id}', [CategoryController::class, 'department_delete'])->name('department.delete');
Route::get('/designation', [CategoryController::class, 'designation'])->name('designation');
Route::post('/designation/store', [CategoryController::class, 'designation_store'])->name('designation.store');
Route::get('/designation/delete/{designation_id}', [CategoryController::class, 'designation_delete'])->name('designation.delete');
Route::get('/producttype', [CategoryController::class, 'product_type'])->name('product.type');
Route::post('/producttype/store', [CategoryController::class, 'product_type_store'])->name('product.store');
Route::get('/producttype/delete/{ProductType_id}', [CategoryController::class, 'product_type_delete'])->name('product.delete');


//store
Route::get('/store', [StoreController::class, 'store'])->name('store');
Route::post('/store/store', [StoreController::class, 'store_store'])->name('store.store');
Route::get('/store/delete/{stores_id}', [StoreController::class, 'store_delete'])->name('store.delete');
Route::get('/store/edit/{id}', [StoreController::class, 'store_edit'])->name('store.edit');
Route::post('/store/update', [StoreController::class, 'store_update'])->name('store.update');
Route::get('/store/view/{stores_id}', [StoreController::class, 'store_view'])->name('store.view');
Route::get('/store/issue/{stores_id}', [StoreController::class, 'issue'])->name('issue');
Route::get('/store/status/{stores_id}', [StoreController::class, 'store_status'])->name('store.status');


//emploee Managment
Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee');
Route::post('/employee/store', [EmployeeController::class, 'employee_store'])->name('employee.store');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'employee_edit'])->name('employee.edit');
Route::post('/employee/search_by_id', [EmployeeController::class, 'search_by_id'])->name('search.by.id');


//desktop
Route::get('/desktop', [DesktopController::class, 'desktop'])->name('desktop');
Route::post('/desktop/store/', [DesktopController::class, 'desktop_store'])->name('desktop.store');
Route::get('/desktop/view/{desktop_id}', [DesktopController::class, 'desktop_view'])->name('desktop.view');






