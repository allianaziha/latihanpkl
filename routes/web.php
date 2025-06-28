<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;
use App\Http\Controllers\BackendController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\OrderController as OrdersController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route guest (tamu) atau member
Route::get('/',[FrontendController::class, 'index']);
Route::get('/product',[FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}',[FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about',[FrontendController::class, 'about']);

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

//orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders{id}',[OrderController::class,'show'])->name('orders.show');

Route::post('/product/{product}/review', [ReviewController::class, 'store'])
    ->middleware('auth')->name('review.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//route untuk admin atau backend
Route::group(['prefix'=>'admin','as' => 'backend.','middleware' => ['auth', Admin::class]], function (){
    Route::get('/', [BackendController::class,'index']);
    //crud
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', OrdersController::class);
    Route::put('/orders/{id}/status',[OrdersController::class, 'updateStatus'])->name('orders.updateStatus');

});

// //rote basic
// Route::get('about', function () {
//     return 'ini halaman about';
// });

// Route::get('profile', function (){
//     return view('profile');
// });

// //route parameter
// Route::get('produk/{namaproduk}', function ($a){
//     return 'saya membeli' .$a;
// });

// Route::get('kategori/{namakategori}', function ($kategori){
//     return view('kategori', compact('kategori'));
// });

// //route optional parameter
// Route::get('search/{keyword?}', function ($key = null){
//     return view('search', compact('key'));
// });

// Route::get('toko/{barang?}/{kode?}', function ($barang = null, $kode = null){
//     return view('toko' , compact('barang','kode'));
// });

// //route buku
// Route::get('buku', [MyController::class, 'index']);
// //tambah buku
// Route::get('buku/create', [MyController::class, 'create']);
// Route::post('buku', [MyController::class, 'store']);
// //show
// Route::get('buku/{id}', [MyController::class, 'show']);
// //edit
// Route::get('buku/{id}/edit', [MyController::class, 'edit']);
// Route::put('buku/{id}', [MyController::class, 'update']);
// //hapus
// Route::delete('buku/{id}', [MyController::class, 'destroy']);
Auth::routes();

