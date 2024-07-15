<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/shoping_page',[HomeController::class,'shoping_page']);

Route::get('/contact',[HomeController::class,'contact']);

Route::post('/contact',[HomeController::class,'send'])->name('contact.send');

Route::get('/myorder',[HomeController::class,'myorder'])->middleware(['auth', 'verified']);

Route::get('/profile',[HomeController::class,'profile'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

Route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

Route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

Route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);

Route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

Route::get('status_search',[AdminController::class,'status_search'])->middleware(['auth','admin']);

Route::get('search_category',[AdminController::class,'search_category'])->middleware(['auth','admin']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);

Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{totalValue}', 'stripe');
    Route::post('stripe/{totalValue}', 'stripePost')->name('stripe.post');
});

Route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);

Route::get('view_order',[AdminController::class,'view_order'])->middleware(['auth','admin']);

Route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware(['auth','admin']);

Route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth','admin']);

Route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware(['auth','admin']);






