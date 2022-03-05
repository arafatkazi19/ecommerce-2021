

<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes for frontend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//Homepage,All Product and Details page routes
Route::get('/',[PagesController::class, 'homepage'])->name('homepage');
Route::get('/all-products',[PagesController::class, 'allProducts'])->name('all-products');
Route::get('{slug}/product-details',[PagesController::class, 'productDetails'])->name('product-details');

Route::get('/checkout',[PagesController::class, 'checkout'])->name('checkout');
Route::get('/customer-login',[PagesController::class, 'login'])->name('customer-login');


//Showing Products according to Parent and Child Categories routes
Route::get('/primary-category/{id}',[PagesController::class, 'primaryCategory'])->name('pcategory.show');
Route::get('/category/{slug}',[PagesController::class, 'category'])->name('category.show');


//search product
Route::get('/search-product',[PagesController::class, 'search'])->name('search');

//Add to cart Routes 
Route::group(['prefix'=>'cart'],function(){
    Route::get('/',[CartController::class, 'index'])->name('cart.items');
    Route::post('/store',[CartController::class, 'store'])->name('cart.store');
    Route::post('/update/{id}',[CartController::class, 'update'])->name('cart.update');
    Route::post('/destroy/{id}',[CartController::class, 'destroy'])->name('cart.destroy');

});


// Customer Routes
Route::group(['prefix'=>'customer'],function(){
    Route::get('/my-profile',[CustomerController::class, 'index'])->name('customer-profile')
    ->middleware('auth','verified');

    Route::get('/profile-update/{id}',[CustomerController::class, 'create'])->name('profile.update')
    ->middleware('auth');

    Route::post('/profile-update-store/{id}',[CustomerController::class, 'store'])->name('profile.store')
    ->middleware('auth');

    // Order Managemetn Routes
    Route::get('/order-history',[OrderManagementController::class, 'index'])->name('order-history');
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




/*
|--------------------------------------------------------------------------
| Web Routes for admin section
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin', 'middleware' => ['auth','verified','role']],function(){
    //admin dashboard
	Route::get('/dashboard','App\Http\Controllers\Backend\PagesController@dashboard')->name('admin.dashboard');

    //Brand Routes
    Route::group(['prefix'=>'brand'],function (){
        Route::get('/manage',[BrandController::class, 'index'])->name('brand.manage');
        Route::get('/create',[BrandController::class, 'create'])->name('brand.create');
        Route::post('/store',[BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}',[BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
        Route::post('/destroy/{id}',[BrandController::class, 'destroy'])->name('brand.destroy');
    });

    //Category Routes
    Route::group(['prefix'=>'category'],function(){
        Route::get('/manage',[CategoryController::class, 'index'])->name('category.manage');
        Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
        Route::post('/destroy/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //Product Routes
    Route::group(['prefix'=>'product'], function (){
        Route::get('/manage',[ProductController::class, 'index'])->name('product.manage');
        Route::get('/create',[ProductController::class, 'create'])->name('product.create');
        Route::post('/store',[ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}',[ProductController::class, 'update'])->name('product.update');
        Route::post('/destroy/{id}',[ProductController::class, 'destroy'])->name('product.destroy');
    });

    //Division Routes
    Route::group(['prefix'=>'division'], function (){
        Route::get('/manage',[DivisionController::class, 'index'])->name('division.manage');
        Route::get('/create',[DivisionController::class, 'create'])->name('division.create');
        Route::post('/store',[DivisionController::class, 'store'])->name('division.store');
        Route::get('/edit/{id}',[DivisionController::class, 'edit'])->name('division.edit');
        Route::post('/update/{id}',[DivisionController::class, 'update'])->name('division.update');
        Route::post('/destroy/{id}',[DivisionController::class, 'destroy'])->name('division.destroy');
    });

    //District Routes
    Route::group(['prefix'=>'district'], function (){
        Route::get('/manage',[DistrictController::class, 'index'])->name('district.manage');
        Route::get('/create',[DistrictController::class, 'create'])->name('district.create');
        Route::post('/store',[DistrictController::class, 'store'])->name('district.store');
        Route::get('/edit/{id}',[DistrictController::class, 'edit'])->name('district.edit');
        Route::post('/update/{id}',[DistrictController::class, 'update'])->name('district.update');
        Route::post('/destroy/{id}',[DistrictController::class, 'destroy'])->name('district.destroy');
    });

});

require __DIR__.'/auth.php';