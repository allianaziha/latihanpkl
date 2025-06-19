<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;

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

Route::get('/', function () {
    return view('welcome');
});

// rote basic
Route::get('about', function () {
    return 'ini halaman about';
});

Route::get('profile', function (){
    return view('profile');
});

//route parameter
Route::get('produk/{namaproduk}', function ($a){
    return 'saya membeli' .$a;
});

Route::get('kategori/{namakategori}', function ($kategori){
    return view('kategori', compact('kategori'));
});

//route optional parameter
Route::get('search/{keyword?}', function ($key = null){
    return view('search', compact('key'));
});

Route::get('toko/{barang?}/{kode?}', function ($barang = null, $kode = null){
    return view('toko' , compact('barang','kode'));
});

//route buku
Route::get('buku', [MyController::class, 'index']);
//tambah buku
Route::get('buku/create', [MyController::class, 'create']);
Route::post('buku', [MyController::class, 'store']);
//show
Route::get('buku/{id}', [MyController::class, 'show']);
//edit
Route::get('buku/{id}/edit', [MyController::class, 'edit']);
Route::put('buku/{id}', [MyController::class, 'update']);
//hapus
Route::delete('buku/{id}', [MyController::class, 'destroy']);