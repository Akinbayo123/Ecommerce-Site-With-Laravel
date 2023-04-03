<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class,'index']
);
Route::get('/redirect', [HomeController::class,'redirect']);
Route::get('/view_category', [AdminController::class,'view'])->middleware('auth');
Route::post('/submit_category', [AdminController::class,'submit_category'])->name('submit_category')->middleware('auth');
Route::get('/delete_cat/{id}', [AdminController::class,'delete_cat'])->middleware('auth');
Route::get('/add_product', [AdminController::class,'add_product'])->middleware('auth');
Route::post('/add_products', [AdminController::class,'add_products'])->middleware('auth');
Route::post('/edit_pros/{id}', [AdminController::class,'edit_pros'])->middleware('auth');
Route::get('/show_product', [AdminController::class,'show_product'])->middleware('auth');
Route::get('/edit_pro/{id}', [AdminController::class,'edit_pro'])->middleware('auth');
Route::get('/delete_pro/{id}', [AdminController::class,'delete_pro'])->middleware('auth');
Route::get('/details/{products}', [HomeController::class,'details']);
Route::post('/add_cart/{product}', [HomeController::class,'add_cart'])->middleware('auth');
Route::post('/update_cart/{product}', [HomeController::class,'update_cart'])->middleware('auth');
Route::get('/cart', [HomeController::class,'cart'])->middleware('auth');
Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart'])->middleware('auth');
Route::get('/cash_pay', [HomeController::class,'cash_pay'])->middleware('auth');
Route::get('/card_pay/{total_price}', [HomeController::class,'card_pay'])->middleware('auth');
Route::post('/stripe/{total_price}',[HomeController::class,'stripePost'])->name('stripe.post')->middleware('auth');
Route::get('/orders', [AdminController::class,'orders'])->middleware('auth');
Route::get('/order_delivered/{order}', [AdminController::class,'order_delivered'])->middleware('auth');
Route::get('/print_pdf/{order}', [AdminController::class,'print_pdf'])->middleware('auth');
Route::get('/my_orders', [HomeController::class,'my_orders'])->middleware('auth');
Route::get('/cancel/{id}', [HomeController::class,'cancel'])->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
