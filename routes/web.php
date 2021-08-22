<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\RegistrateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZapchastController;
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
route::group(['prefix' => 'admin','middleware'=> 'auth'], function() {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('/catalog', 'App\Http\Controllers\Admin\CatalogController');//контроллер ресурса компаний
    Route::resource('/product', 'App\Http\Controllers\Admin\ProductController');//контроллер ресурса компаний
    Route::resource('/zapchast', 'App\Http\Controllers\Admin\ZapchastController');//контроллер ресурса компаний
});

Route::get('/login', [UserController::class, 'loginForm'])->name('login');//контроллер ресурса компаний
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('{catalog}', [MainController::class,  'product'])->name('catalog.product');
Route::get('{catalog}/{product}', [MainController::class, 'productzap'])->name('product.zapchast');

