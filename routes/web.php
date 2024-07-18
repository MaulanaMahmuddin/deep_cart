<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterKeranjangController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\ViewKeranjangController;

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

## Keranjang
# List
Route::get('/list-keranjang', [MasterKeranjangController::class, 'index']);

# Create
Route::get('/create-keranjang', [MasterKeranjangController::class, 'create']);
Route::post('/create-keranjang', [MasterKeranjangController::class, 'store']);

# Edit
Route::get('/edit-keranjang/{id}', [MasterKeranjangController::class, 'edit']);
Route::post('/update-keranjang/{id}', [MasterKeranjangController::class, 'update']);

# Delete
Route::get('/delete-keranjang/{id}', [MasterKeranjangController::class, 'destroy']);


## Barang
# List
Route::get('/list-barang', [MasterBarangController::class, 'index']);

# Create
Route::get('/create-barang', [MasterBarangController::class, 'create']);
Route::post('/create-barang', [MasterBarangController::class, 'store']);

# Edit
Route::get('/edit-barang/{id}', [MasterBarangController::class, 'edit']);
Route::post('/update-barang/{id}', [MasterBarangController::class, 'update']);

# Delete
Route::get('/delete-barang/{id}', [MasterBarangController::class, 'destroy']);

## View Keranjang
# List
Route::get('/list-viewKeranjang', [ViewKeranjangController::class, 'index']);