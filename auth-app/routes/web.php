<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductController;

 
// for frontend

Route::controller(FrontendController::class)->group(function(){

    Route::get('/', 'home')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/single-product', 'single_product')->name('product.single');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('product.checkout');
    Route::get('/product/single/{id}', 'singleProduct')->name('singleP');
});

 
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// for admin logout
Route::get('/admin-logout', [AdminController::class, 'destroy'])->name('admin.logout');

// for user
Route::controller(AdminController::class)->group(function(){
    
    // for user show
    Route::get('/manage-user', 'manage_user')->name('user.manage');
    
    // for user delete
    Route::get('/delete-user/{id}', 'delete')->name('user.delete');
    
    // for edit user
    Route::get('/edit-user/{id}', 'edit')->name('user.edit');
    
    // for update user
    Route::post('/update-user/{id}', 'update')->name('user.update');
    
    
});

// for product
Route::controller(ProductController::class)->group(function(){

    Route::get('/product/add', 'create')->name('product.add');
    Route::post('/product/added', 'store')->name('product.added');
    Route::get('/product/manage', 'show')->name('product.manage');
    Route::get('product/inactive/{id}', 'atoi')->name('atoi');
    Route::get('/product/active/{id}', 'itoa')->name('itoa');
    Route::get('/product/delete/{id}', 'destroy')->name('product.delete');
    Route::get('/product/edit/{id}', 'edit')->name('product.edit');
    Route::post('product/update/{id}', 'update')->name('product.update');

});


// for frontend 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
