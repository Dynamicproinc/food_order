<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/product/{id}', function ($id) {
//     return view('welcome');
// });

Route::get('locale\{lang}',[App\Http\Controllers\LocalizationController::class, 'setLocale']);

Auth::routes();
Auth::routes(['verify' => true]);
//account
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my-account', [App\Http\Controllers\HomeController::class, 'index'])->name('myaccount');
Route::get('/my-account/order/{slug}', [App\Http\Controllers\HomeController::class, 'viewOrder'])->name('myaccount.vieworder');



Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
// Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/category/{category}', [App\Http\Controllers\ShopController::class, 'category'])->name('shop.category');
// Route::get('/shop/{slug}', [App\Http\Controllers\ShopController::class, 'showProduct'])->name('shop.showproduct');
Route::get('/checkout', [App\Http\Controllers\ShopController::class, 'cart'])->name('shop.cart')->middleware(['auth','verified']);

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    
    Route::get('/add-product', [App\Http\Controllers\AdminController::class,'addProduct'])->name('admin.addproduct');
    Route::get('/products', [App\Http\Controllers\AdminController::class,'products'])->name('admin.products.index');
    Route::get('/product/edit/{id}', [App\Http\Controllers\AdminController::class,'editProduct'])->name('admin.product.edit');
    Route::get('/kitchen',[App\Http\Controllers\AdminController::class,'kitchen'])->name('admin.kitchen');
    Route::get('/add-coupon',[App\Http\Controllers\AdminController::class,'addCoupone'])->name('admin.product.coupon');
});

// artisan commands
Route::get('/abc123', function () {
    \Artisan::call('migrate', ['--force' => true]);
    return response()->json(['status' => 'Migration completed']);
});;
// Route::get('/storage-link', function () {
//     Artisan::call('storage:link');
//     return response()->json(['status' => 'Storage link created']);
// })->middleware('auth');
